"use strict";
var KTSigninGeneral = function() {
    var e, t, i;
    return {
        init: function() {
            e = document.querySelector("#kt_sign_in_form"), t = document.querySelector("#kt_sign_in_submit"), i = FormValidation.formValidation(e, {
                fields: {
                    email: {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: "The value is not a valid email address"
                            },
                            notEmpty: {
                                message: "Email address is required"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), t.addEventListener("click", (function(n) {
				
				n.preventDefault() 
				
				var email = $('.login-email').val();
				var password =	$('.login-password').val();
					
				$.ajax({
					url: baseUrl + 'authentication/login',
					method: "POST",
					data: {email:email,password:password},
					dataType:'json',
					success: function(response){
						if(response['result'] == 'success')
						{
							Swal.fire({
								text: "You have successfully logged in!",
								icon: "success",
								buttonsStyling: !1,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((function() {
								location.href = baseUrl + 'dashboard';
							}))
						}
						else
						{
							Swal.fire({
								// text: "Sorry, looks like there are some errors detected, please try again.",
								text: response['message'],
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							})
							
						}
					}
				});
				/* i.validate().then((function(i) {
					"Valid" == i ? (t.setAttribute("data-kt-indicator", "on"), t.disabled = !0, setTimeout((function() {
						t.removeAttribute("data-kt-indicator"), t.disabled = !1, Swal.fire({
							text: "You have successfully logged in!",
							icon: "success",
							buttonsStyling: !1,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then((function(t) {
							if (t.isConfirmed) {
								e.querySelector('[name="email"]').value = "", e.querySelector('[name="password"]').value = "";
								var i = e.getAttribute("data-kt-redirect-url");
								i && (location.href = i)
							}
						}))
					}), 2e3)) : Swal.fire({
						text: "Sorry, looks like there are some errors detected, please try again.",
						icon: "error",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary"
						}
					})
				})) */
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTSigninGeneral.init()
}));