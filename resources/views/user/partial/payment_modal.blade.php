<style>
    
    /* Payment iframe styles */
    .payment-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 9999;
        display: none;
    }
    .payment-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        max-width: 800px;
        height: 80%;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.3);
    }
    .payment-header {
        background: #3498db;
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .payment-header h4 {
        margin: 0;
        font-size: 18px;
    }
    .close-payment {
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
    }
    .payment-iframe {
        width: 100%;
        height: calc(100% - 60px);
        border: none;
    }
    .payment-loading {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #3498db;
    }
    .payment-success {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #27ae60;
        display: none;
    }
</style>
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
            <p></p>
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

<script>    let paymentInProgress = false;
    let paymentCheckInterval = null;

function submit_update_plan(selected_plan_id, price) {
    if (paymentInProgress) {
        return;
    }
    
    $('#plan_id').val(selected_plan_id);
    
    // Show payment overlay
    showPaymentOverlay();
    
    // Open a new tab for payment
    var form = document.getElementById('update_plan_form');
    var originalTarget = form.target;
    
    // Set target to open in new tab
    form.target = '_blank';
    
    // Submit the form
    form.submit();
    
    // Restore original target
    form.target = originalTarget;
    
    paymentInProgress = true;
    
    // Start checking payment status periodically
    startPaymentStatusCheck();
}

function showPaymentOverlay() {
    $('#paymentOverlay').show();
    $('#paymentLoading').show();
    $('#paymentIframe').hide();
    $('#paymentSuccess').hide();
    
    // Update loading message to show we're waiting for payment
    $('#paymentLoading').html(`
        <i class="fa fa-spinner fa-spin fa-3x"></i>
        <p>Waiting for payment completion...</p>
        <p><small>Please complete the payment in the new tab</small></p>
    `);
}

function startPaymentStatusCheck() {
    // Clear any existing interval
    if (paymentCheckInterval) {
        clearInterval(paymentCheckInterval);
    }
    
    // Start checking every 3 seconds
    paymentCheckInterval = setInterval(function() {
        checkPaymentStatus();
    }, 3000);
}

function stopPaymentStatusCheck() {
    if (paymentCheckInterval) {
        clearInterval(paymentCheckInterval);
        paymentCheckInterval = null;
    }
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
    // Close the payment overlay
    closePayment();
    
    // Open PayPal in new tab
    var newTab = window.open(paypalUrl, 'paypal_payment', 'width=800,height=600');
    
    if (!newTab) {
        openErrorModal('Popup blocked. Please allow popups for this site and try again.');
        return;
    }
    
    // Show payment overlay again to indicate we're waiting
    showPaymentOverlay();
    
    // Check if new tab is closed (user completed or cancelled payment)
    var tabCheck = setInterval(function() {
        if (newTab.closed) {
            clearInterval(tabCheck);
            // Start checking payment status when user returns
            startPaymentStatusCheck();
        }
    }, 1000);
    
    // Also listen for focus event when user returns to tab
    window.addEventListener('focus', function checkFocus() {
        setTimeout(function() {
            // User returned to this tab, check payment status
            startPaymentStatusCheck();
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
                // Payment successful - stop checking and show success
                stopPaymentStatusCheck();
                handlePaymentSuccess(response.memorial_id);
            } else {
                // Payment not completed yet, update loading message
                $('#paymentLoading').html(`
                    <i class="fa fa-spinner fa-spin fa-3x"></i>
                    <p>Waiting for payment completion...</p>
                    <p><small>Status: Payment pending</small></p>
                    <button class="btn btn-warning btn-sm" onclick="cancelPayment()" style="margin-top: 10px;">
                        Cancel Payment
                    </button>
                `);
                // Continue checking - don't show error modal
            }
        },
        error: function() {
            // Network error, but don't stop checking
            $('#paymentLoading').html(`
                <i class="fa fa-spinner fa-spin fa-3x"></i>
                <p>Checking payment status...</p>
                <p><small>Status: Unable to verify - retrying</small></p>
                <button class="btn btn-warning btn-sm" onclick="cancelPayment()" style="margin-top: 10px;">
                    Cancel Payment
                </button>
            `);
        }
    });
}

function cancelPayment() {
    // Stop checking payment status
    stopPaymentStatusCheck();
    
    // Reset payment state
    paymentInProgress = false;
    
    // Close payment overlay
    closePayment();
    
    // Show cancellation message
    openErrorModal('Payment process cancelled. You can try again anytime.');
}

function handlePaymentSuccess(memorialId) {
    // Show success in the payment overlay
    $('#paymentLoading').hide();
    $('#paymentIframe').hide();
    $('#paymentSuccess').show();
    $('#paymentSuccess p').text('Your plan has been activated successfully. Redirecting to privacy settings...');
    
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
    // Stop any ongoing payment checks
    stopPaymentStatusCheck();
    
    // Hide payment overlay
    $('#paymentOverlay').hide();
    $('#paymentIframe').attr('src', 'about:blank');
    
    // Reset loading message
    $('#paymentLoading').html(`
        <i class="fa fa-spinner fa-spin fa-3x"></i>
        <p>Waiting for payment process...</p>
    `);
    
    // Reset payment state
    paymentInProgress = false;
}
</script>