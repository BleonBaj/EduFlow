<?php
require_once __DIR__ . '/../includes/session.php';
if (isset($_SESSION['admin_id'])) {
    header('Location: dashboard.php');
    exit;
}
require_once __DIR__ . '/../partials/header.php';
// Determine language from header include
// Basic localization for the login error message
$loginError = isset($_GET['err']) && $_GET['err'] === 'invalid';
$msgInvalid = ($lang ?? 'sq') === 'en' ? 'Invalid email or password.' : 'Email ose fjalëkalim i pasaktë.';
?>
<main class="app-root login-page">
    <section class="section active" data-section="login">
        <div class="section-header">
            <h2 data-i18n="login-title">Qasja në platformë</h2>
        </div>
        <div class="auth-card">
            <div class="auth-card-header">
                <div class="auth-logo">
                    <i data-lucide="shield-check" class="auth-icon"></i>
                </div>
                <h2 data-i18n="login-title">Qasja në platformë</h2>
                <p class="auth-subtitle" data-i18n="login-subtitle">Hyni në llogarinë tuaj për të vazhduar</p>
            </div>
            
            <?php if ($loginError): ?>
            <div class="alert error" id="login-message">
                <i data-lucide="alert-circle"></i>
                <span><?php echo htmlspecialchars($msgInvalid); ?></span>
            </div>
            <?php else: ?>
            <div class="alert" id="login-message" hidden></div>
            <?php endif; ?>
            
            <form id="login-form" class="auth-form" method="post" action="api/auth.php" novalidate>
                <input type="hidden" name="action" value="login">
                <div class="form-field">
                    <label for="username" data-i18n="label-username">
                        <i data-lucide="user"></i>
                        <span>Përdoruesi ose Email</span>
                    </label>
                    <input type="text" id="username" name="username" autocomplete="username" 
                           placeholder="Shkruani përdoruesin ose email-in" required
                           class="form-input">
                </div>
                <div class="form-field">
                    <label for="password" data-i18n="label-password">
                        <i data-lucide="lock"></i>
                        <span>Fjalëkalimi</span>
                    </label>
                    <div class="password-input-wrapper">
                        <input type="password" id="password" name="password" autocomplete="current-password" 
                               placeholder="Shkruani fjalëkalimin" required
                               class="form-input">
                        <button type="button" class="password-toggle" id="password-toggle" aria-label="Toggle password visibility">
                            <i data-lucide="eye" class="eye-icon"></i>
                            <i data-lucide="eye-off" class="eye-off-icon" style="display: none;"></i>
                        </button>
                    </div>
                </div>
                <div class="form-field form-field-link">
                    <a href="#" id="forgot-password-link" data-i18n="link-forgot-password">
                        <i data-lucide="help-circle"></i>
                        <span>Keni harruar fjalëkalimin?</span>
                    </a>
                </div>
                <button type="submit" class="primary btn-login" data-i18n="action-login">
                    <span class="btn-text">Hyr</span>
                    <i data-lucide="arrow-right" class="btn-icon"></i>
                    <span class="btn-loader" style="display: none;">
                        <i data-lucide="loader-2" class="spinning"></i>
                    </span>
                </button>
            </form>
            
            <!-- 2FA Verification Modal -->
            <div class="modal" id="modal-2fa-verify" data-modal>
                <div class="modal-content modal-2fa">
                    <div class="modal-header">
                        <div class="modal-icon">
                            <i data-lucide="mail" class="icon-large"></i>
                        </div>
                        <h3 data-i18n="2fa-verify-title">Verifikim me kod</h3>
                        <p class="modal-description" data-i18n="2fa-verify-description">
                            Shkruani kod-in 6-shifror që u dërgua.
                        </p>
                    </div>
                    <div class="alert" id="2fa-message" hidden></div>
                    <form id="2fa-verify-form" class="form-2fa">
                        <div class="form-field form-field-2fa">
                            <label for="2fa-code" data-i18n="label-verification-code">Kodi i verifikimit</label>
                            <div class="code-input-wrapper">
                                <input type="text" id="2fa-code" name="code" required autocomplete="off" 
                                       placeholder="000000" maxlength="6" pattern="[0-9]{6}" 
                                       inputmode="numeric" class="code-input">
                                <div class="code-hint">
                                    <i data-lucide="info"></i>
                                    <span>Kodi është 6-shifror</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-actions">
                            <button type="submit" class="primary" data-i18n="action-verify">
                                <span>Verifiko</span>
                                <i data-lucide="check"></i>
                            </button>
                            <button type="button" class="secondary" data-close data-i18n="action-cancel">
                                <span>Anulo</span>
                            </button>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="link" id="btn-resend-2fa-code" data-i18n="action-resend-code">
                            <i data-lucide="refresh-cw"></i>
                            <span>Dërgo kodin përsëri</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Forgot Password Modal -->
            <div class="modal" id="modal-forgot-password" data-modal>
                <div class="modal-content">
                    <h3 data-i18n="forgot-password-title">Rivendosja e fjalëkalimit</h3>
                    <p style="margin-bottom: 20px; color: var(--text-muted);">Kodi i verifikimit do të dërgohet automatikisht në email-in tuaj.</p>
                    <form id="forgot-password-form">
                        <div class="modal-actions">
                            <button type="submit" class="primary" data-i18n="action-send-code">Dërgo kod</button>
                            <button type="button" class="secondary" data-close data-i18n="action-cancel">Anulo</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Verify Code Modal -->
            <div class="modal" id="modal-verify-code" data-modal>
                <div class="modal-content">
                    <h3 data-i18n="verify-code-title">Verifikimi i kodit</h3>
                    <p data-i18n="verify-code-description">Shkruaj kod-in që u dërgua</p>
                    <form id="verify-code-form">
                        <div class="form-field">
                            <label for="reset-code" data-i18n="label-verification-code">Kodi i verifikimit</label>
                            <input type="text" id="reset-code" name="code" required autocomplete="off" 
                                   placeholder="000000" maxlength="6" pattern="[0-9]{6}" 
                                   inputmode="numeric">
                        </div>
                        <div class="modal-actions">
                            <button type="submit" class="primary" data-i18n="action-verify">Verifiko</button>
                            <button type="button" class="secondary" data-close data-i18n="action-cancel">Anulo</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Reset Password Modal -->
            <div class="modal" id="modal-reset-password" data-modal>
                <div class="modal-content">
                    <h3 data-i18n="reset-password-title">Rivendos fjalëkalimin</h3>
                    <p data-i18n="reset-password-description">Shkruaj fjalëkalimin e ri</p>
                    <form id="reset-password-form">
                        <div class="form-field">
                            <label for="new-password" data-i18n="label-new-password">Fjalëkalimi i ri</label>
                            <div class="password-input-wrapper">
                                <input type="password" id="new-password" name="password" required autocomplete="new-password" 
                                       placeholder="Shkruani fjalëkalimin e ri" minlength="8"
                                       class="form-input">
                                <button type="button" class="password-toggle" id="new-password-toggle" aria-label="Toggle password visibility">
                                    <i data-lucide="eye" class="eye-icon"></i>
                                    <i data-lucide="eye-off" class="eye-off-icon" style="display: none;"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-field">
                            <label for="confirm-password" data-i18n="label-confirm-password">Konfirmo fjalëkalimin</label>
                            <div class="password-input-wrapper">
                                <input type="password" id="confirm-password" name="confirm_password" required autocomplete="new-password" 
                                       placeholder="Konfirmoni fjalëkalimin" minlength="8"
                                       class="form-input">
                                <button type="button" class="password-toggle" id="confirm-password-toggle" aria-label="Toggle password visibility">
                                    <i data-lucide="eye" class="eye-icon"></i>
                                    <i data-lucide="eye-off" class="eye-off-icon" style="display: none;"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-actions">
                            <button type="submit" class="primary" data-i18n="action-reset-password">Rivendos fjalëkalimin</button>
                            <button type="button" class="secondary" data-close data-i18n="action-cancel">Anulo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
require_once __DIR__ . '/../partials/footer.php';
?>
