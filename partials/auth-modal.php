<?php
$redirectTo = htmlspecialchars($_SERVER['REQUEST_URI'] ?? 'index.php', ENT_QUOTES, 'UTF-8');
?>

<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Login / Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs mb-3" id="authTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-pane" type="button" role="tab" aria-controls="login-pane" aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-pane" type="button" role="tab" aria-controls="register-pane" aria-selected="false">Register</button>
                    </li>
                </ul>

                <div class="tab-content" id="authTabsContent">
                    <div class="tab-pane fade show active" id="login-pane" role="tabpanel" aria-labelledby="login-tab">
                        <form action="login.php" method="POST" novalidate data-auth-form="login">
                            <input type="hidden" name="redirect_to" value="<?php echo $redirectTo; ?>">
                            <div class="mb-3">
                                <label for="login-email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="login-email" name="email" required>
                                <div class="form-text d-flex align-items-center gap-2 mt-1" data-email-check="login">
                                    <span class="email-check-icon text-danger" aria-hidden="true">x</span>
                                    <span>Valid email format</span>
                                </div>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>
                            <div class="mb-3">
                                <label for="login-password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="login-password" name="password" required>
                                <div class="invalid-feedback">Please enter your password.</div>
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Login</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="register-pane" role="tabpanel" aria-labelledby="register-tab">
                        <form action="register.php" method="POST" enctype="multipart/form-data" novalidate data-auth-form="register">
                            <input type="hidden" name="redirect_to" value="<?php echo $redirectTo; ?>">
                            <div class="mb-3">
                                <label for="register-name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="register-name" name="name" required>
                                <div class="invalid-feedback">Please enter your full name.</div>
                            </div>
                            <div class="mb-3">
                                <label for="register-email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="register-email" name="email" required>
                                <div class="form-text d-flex align-items-center gap-2 mt-1" data-email-check="register">
                                    <span class="email-check-icon text-danger" aria-hidden="true">x</span>
                                    <span>Valid email format</span>
                                </div>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>
                            <div class="mb-3">
                                <label for="register-phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="register-phone" name="phone" placeholder="07xxxxxxxx or 01xxxxxxxx" required>
                                <div class="invalid-feedback">Use a valid phone number starting with 07 or 01.</div>
                            </div>
                            <div class="mb-3">
                                <label for="register-address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="register-address" name="address" required>
                                <div class="invalid-feedback">Please enter your address.</div>
                            </div>
                            <div class="mb-3">
                                <label for="register-profile-pic" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" id="register-profile-pic" name="profile_pic" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="register-password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="register-password" name="password" required>
                                <div class="form-text mb-2">Password must satisfy all of these rules:</div>
                                <ul class="list-unstyled small mb-0 ps-1" id="password-rules">
                                    <li class="d-flex align-items-center gap-2 mb-1" data-rule="length">
                                        <span class="rule-icon text-danger" aria-hidden="true">x</span>
                                        <span>At least 8 characters</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-1" data-rule="uppercase">
                                        <span class="rule-icon text-danger" aria-hidden="true">x</span>
                                        <span>One uppercase letter</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-1" data-rule="lowercase">
                                        <span class="rule-icon text-danger" aria-hidden="true">x</span>
                                        <span>One lowercase letter</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-1" data-rule="number">
                                        <span class="rule-icon text-danger" aria-hidden="true">x</span>
                                        <span>One number</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-1" data-rule="special">
                                        <span class="rule-icon text-danger" aria-hidden="true">x</span>
                                        <span>One special character</span>
                                    </li>
                                </ul>
                                <div class="invalid-feedback">Password must meet the strength rules.</div>
                            </div>
                            <div class="mb-3">
                                <label for="register-confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="register-confirm-password" name="confirm_password" required>
                                <div class="invalid-feedback">Passwords must match.</div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="1" id="register-newsletter" name="newsletter">
                                <label class="form-check-label" for="register-newsletter">
                                    Subscribe to newsletter
                                </label>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phonePattern = /^(07|01)\d{8}$/;
    const strongPasswordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    const passwordRules = [
        { key: 'length', test: (value) => value.length >= 8 },
        { key: 'uppercase', test: (value) => /[A-Z]/.test(value) },
        { key: 'lowercase', test: (value) => /[a-z]/.test(value) },
        { key: 'number', test: (value) => /\d/.test(value) },
        { key: 'special', test: (value) => /[\W_]/.test(value) },
    ];

    const setFieldState = (field, isValid, message) => {
        field.classList.toggle('is-valid', isValid);
        field.classList.toggle('is-invalid', !isValid);
        field.setCustomValidity(isValid ? '' : (message || 'Invalid value.'));
    };

    const updateEmailChecker = (form, fieldId) => {
        const input = form.querySelector(`#${fieldId}`);
        const checker = form.querySelector(`[data-email-check="${fieldId.includes('login') ? 'login' : 'register'}"]`);
        if (!input || !checker) {
            return;
        }

        const met = emailPattern.test(input.value.trim());
        const icon = checker.querySelector('.email-check-icon');

        checker.classList.toggle('text-success', met);
        checker.classList.toggle('text-danger', !met);
        checker.classList.toggle('fw-semibold', met);
        icon.textContent = met ? '✓' : 'x';
        icon.classList.toggle('text-success', met);
        icon.classList.toggle('text-danger', !met);
    };

    const updatePasswordChecklist = (form) => {
        const password = form.querySelector('#register-password');
        const value = password.value;
        const rules = form.querySelectorAll('#password-rules [data-rule]');

        rules.forEach((item) => {
            const key = item.dataset.rule;
            const rule = passwordRules.find((entry) => entry.key === key);
            const met = rule ? rule.test(value) : false;
            const icon = item.querySelector('.rule-icon');

            item.classList.toggle('text-success', met);
            item.classList.toggle('text-danger', !met);
            item.classList.toggle('fw-semibold', met);
            icon.textContent = met ? '✓' : 'x';
            icon.classList.toggle('text-success', met);
            icon.classList.toggle('text-danger', !met);
        });
    };

    const validateLoginForm = (form) => {
        const email = form.querySelector('#login-email');
        const password = form.querySelector('#login-password');

        const emailValid = emailPattern.test(email.value.trim());
        const passwordValid = password.value.trim().length > 0;

        updateEmailChecker(form, 'login-email');
        setFieldState(email, emailValid, 'Please enter a valid email address.');
        setFieldState(password, passwordValid, 'Please enter your password.');

        return emailValid && passwordValid;
    };

    const validateRegisterForm = (form) => {
        const name = form.querySelector('#register-name');
        const email = form.querySelector('#register-email');
        const phone = form.querySelector('#register-phone');
        const address = form.querySelector('#register-address');
        const password = form.querySelector('#register-password');
        const confirmPassword = form.querySelector('#register-confirm-password');

        const nameValid = name.value.trim().length > 0;
        const emailValid = emailPattern.test(email.value.trim());
        const phoneValid = phonePattern.test(phone.value.trim());
        const addressValid = address.value.trim().length > 0;
        const passwordValid = strongPasswordPattern.test(password.value);
        const confirmValid = confirmPassword.value.length > 0 && confirmPassword.value === password.value;

        updateEmailChecker(form, 'register-email');
        updatePasswordChecklist(form);
        setFieldState(name, nameValid, 'Please enter your full name.');
        setFieldState(email, emailValid, 'Please enter a valid email address.');
        setFieldState(phone, phoneValid, 'Use a valid phone number starting with 07 or 01.');
        setFieldState(address, addressValid, 'Please enter your address.');
        setFieldState(password, passwordValid, 'Password must meet the strength rules.');
        setFieldState(confirmPassword, confirmValid, 'Passwords must match.');

        return nameValid && emailValid && phoneValid && addressValid && passwordValid && confirmValid;
    };

    document.querySelectorAll('form[data-auth-form]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            const isLogin = form.dataset.authForm === 'login';
            const isValid = isLogin ? validateLoginForm(form) : validateRegisterForm(form);

            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
                const firstInvalid = form.querySelector('.is-invalid');
                if (firstInvalid) {
                    firstInvalid.focus();
                }
            }
        });

        form.querySelectorAll('input').forEach((input) => {
            input.addEventListener('input', () => {
                input.classList.remove('is-invalid');
                input.setCustomValidity('');

                if (form.dataset.authForm === 'register' && input.id === 'register-confirm-password') {
                    const password = form.querySelector('#register-password');
                    const confirmValid = input.value.length > 0 && input.value === password.value;
                    setFieldState(input, confirmValid, 'Passwords must match.');
                }

                if (form.dataset.authForm === 'register' && input.id === 'register-password') {
                    const confirmPassword = form.querySelector('#register-confirm-password');
                    if (confirmPassword.value.length > 0) {
                        const confirmValid = confirmPassword.value === input.value;
                        setFieldState(confirmPassword, confirmValid, 'Passwords must match.');
                    }
                    updatePasswordChecklist(form);
                }

                if (input.id === 'login-email' || input.id === 'register-email') {
                    updateEmailChecker(form, input.id);
                }
            });
        });
    });

    document.querySelectorAll('form[data-auth-form="register"]').forEach((form) => {
        updateEmailChecker(form, 'register-email');
        updatePasswordChecklist(form);
    });

    document.querySelectorAll('form[data-auth-form="login"]').forEach((form) => {
        updateEmailChecker(form, 'login-email');
    });
});
</script>
