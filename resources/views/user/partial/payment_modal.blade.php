
<!-- Payment iframe overlay -->
<div class="payment-overlay" id="paymentOverlay">
    <div class="payment-container">
        <div class="payment-header">
            <h4>Complete Your Payment</h4>
            <button class="close-payment" onclick="closePayment()">&times;</button>
        </div>
        <div class="payment-loading" id="paymentLoading">
            <i class="fa fa-spinner fa-spin fa-3x"></i>
            <p>Waiting for payment process...</p>
        </div>
        <iframe class="payment-iframe" id="paymentIframe" style="display: none;"></iframe>
        <div class="payment-success" id="paymentSuccess">
            <i class="fa fa-check-circle fa-5x"></i>
            <h3>Payment Successful!</h3>
            <p>Redirecting to memorial page...</p>
        </div>
    </div>
</div>

<form action="{!! asset('user/memorial/update_plan') !!}" method="post" id="update_plan_form" target="paymentIframe">
    {!! csrf_field() !!}
    <input type="hidden" name="memorial_id" class="memorial_id">
    <input type="hidden" name="plan_id" id="plan_id">
</form>


<!-- Professional-Looking Bootstrap Modal Structure -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content error_content">
            <div class="modal-header error_header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="errorModalLabel"><i class="fa fa-times cross_icn" aria-hidden="true"></i></h5>
                
            </div>
            <div class="modal-body error_body">
                <h3></h3>
                <div id="error-message" class="alert alert-danger custom_alt" role="alert"></div>
            </div>
            <div class="modal-footer error-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
function submit_update_plan(selected_plan_id, price) {
    if (paymentInProgress) {
        return;
    }
    
    $('#plan_id').val(selected_plan_id);
    showPaymentIframe();
    
    // Submit form via AJAX to get the payment URL
    $.ajax({
        url: $('#update_plan_form').attr('action'),
        method: 'POST',
        data: $('#update_plan_form').serialize(),
        success: function(response) {
            if (response.redirect_url) {
                // Try to load PayPal in iframe, but have fallback for new tab
                loadPayPalInIframe(response.redirect_url);
            } else {
                openErrorModal('Failed to get payment URL');
                closePayment();
            }
        },
        error: function(xhr, status, error) {
            console.error('Payment initiation failed:', error);
            openErrorModal('Failed to initialize payment. Please try again.');
            closePayment();
        }
    });
}

function loadPayPalInIframe(paypalUrl) {
    var iframe = document.getElementById('paymentIframe');
    
    // Add load event listener to detect if PayPal blocks iframe
    iframe.onload = function() {
        // Check if PayPal blocked the iframe (usually shows an error page)
        try {
            var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
            var iframeContent = iframeDoc.body.innerHTML;
            
            if (iframeContent.includes('X-Frame-Options') || 
                iframeContent.includes('frame-ancestors') ||
                iframeContent.includes('click here') ||
                iframeDoc.title === 'Blocked') {
                
                // PayPal blocked iframe embedding, open in new tab
                handlePayPalNewTab(paypalUrl);
            }
        } catch (e) {
            // Cross-origin error - PayPal is likely blocking iframe
            console.log('Cross-origin error, PayPal likely blocking iframe');
            handlePayPalNewTab(paypalUrl);
        }
    };
    
    // Add error event listener
    iframe.onerror = function() {
        handlePayPalNewTab(paypalUrl);
    };
    
    // Try to load PayPal in iframe
    $('#paymentLoading').hide();
    $('#paymentIframe').show();
    iframe.src = paypalUrl;
    
    // Set timeout to check if iframe loaded properly
    setTimeout(function() {
        try {
            var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
            if (iframeDoc.readyState === 'complete' && iframeDoc.body.innerHTML.length < 100) {
                // If iframe content is minimal, PayPal likely blocked it
                handlePayPalNewTab(paypalUrl);
            }
        } catch (e) {
            // Can't access iframe content due to cross-origin
            // This is normal for PayPal, continue with iframe approach
        }
    }, 2000);
}

function handlePayPalNewTab(paypalUrl) {
    // Close the modal
    closePayment();
    
    // Open PayPal in new tab
    var newTab = window.open(paypalUrl, 'paypal_payment', 'width=800,height=600');
    
    if (!newTab) {
        openErrorModal('Popup blocked. Please allow popups for this site and try again.');
        return;
    }
    
    // Check for payment completion every 2 seconds
    var paymentCheck = setInterval(function() {
        if (newTab.closed) {
            clearInterval(paymentCheck);
            checkPaymentStatus();
        }
    }, 2000);
    
    // Also listen for focus event when user returns to tab
    window.addEventListener('focus', function checkFocus() {
        setTimeout(function() {
            checkPaymentStatus();
            window.removeEventListener('focus', checkFocus);
        }, 1000);
    });
}

function checkPaymentStatus() {
    // Check with server if payment was completed
    $.ajax({
        url: '{!! route("check.payment.status") !!}',
        method: 'GET',
        data: {
            memorial_id: $('.memorial_id').val(),
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.payment_completed) {
                handlePaymentSuccess(response.memorial_id);
            } else {
                // Payment not completed, user might have cancelled
                openErrorModal('Payment was not completed. Please try again if you wish to proceed.');
            }
        },
        error: function() {
            openErrorModal('Unable to verify payment status. Please check your account or contact support.');
        }
    });
}

function showPaymentIframe() {
    $('#paymentOverlay').show();
    $('#paymentLoading').show();
    $('#paymentIframe').hide();
    paymentInProgress = true;
}

function handlePaymentSuccess(memorialId) {
    // Show success message
    var successHtml = `
        <div style="text-align: center; padding: 50px; background: #f8f9fa;">
            <div style="color: #28a745; font-size: 48px; margin-bottom: 20px;">✓</div>
            <h2 style="color: #155724; margin-bottom: 20px;">Payment Successful!</h2>
            <p>Your plan has been activated successfully.</p>
            <p>Redirecting to privacy settings...</p>
        </div>
    `;
    
    // Show success in modal
    $('#paymentIframe').hide();
    $('#paymentLoading').html(successHtml).show();
    
    // Wait 3 seconds then close and navigate
    setTimeout(function() {
        closePayment();
        // Navigate to privacy tab
        if (memorialId) {
            $('.memorial_id').val(memorialId);
        }
        window.scrollTo(0, 400);
        $('.nav-tabs a[href="#menu3"]').tab('show');
    }, 3000);
}

function closePayment() {
    $('#paymentOverlay').hide();
    $('#paymentIframe').attr('src', 'about:blank');
    $('#paymentLoading').html('<i class="fa fa-spinner fa-spin fa-3x"></i><p>Loading payment form...</p>');
    paymentInProgress = false;
}
</script>