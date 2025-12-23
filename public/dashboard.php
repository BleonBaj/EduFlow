<?php
require_once __DIR__ . '/../includes/auth.php';
$admin = require_authenticated_admin_page();
require_once __DIR__ . '/../partials/header.php';
require_once __DIR__ . '/../partials/nav.php';
?>
<main class="app-root" id="dashboard" data-page="dashboard">
    <!-- Dashboard Section - First page after login -->
    <section class="section active" data-section="dashboard">
        <div class="section-header">
            <button type="button" class="sidebar-toggle" id="sidebar-toggle">
                <i data-lucide="menu"></i>
            </button>
            <div>
                <h2 data-i18n="dashboard-title">
                    <i data-lucide="layout-dashboard" class="section-icon"></i>
                    <span>Dashboard</span>
                </h2>
                <p class="section-sub" data-i18n="dashboard-subtitle">Pasqyrë e përgjithshme e sistemit</p>
            </div>
        </div>
        <div class="section-body">
            <div class="dashboard-stats-grid" id="dashboard-stats">
                <!-- Stats will be loaded here -->
            </div>

            <div class="dashboard-quick-actions">
                <h3 data-i18n="dashboard-quick-actions">Veprime të shpejta</h3>
                <div class="quick-actions-grid">
                    <button type="button" class="quick-action-card" data-quick-action="course">
                        <span class="action-icon"><i data-lucide="graduation-cap"></i></span>
                        <span class="action-label" data-i18n="dashboard-add-course">Shto Kurs</span>
                    </button>
                    <button type="button" class="quick-action-card" data-quick-action="class">
                        <span class="action-icon"><i data-lucide="book-open"></i></span>
                        <span class="action-label" data-i18n="dashboard-add-class">Shto Klasë</span>
                    </button>
                    <button type="button" class="quick-action-card" data-quick-action="student">
                        <span class="action-icon"><i data-lucide="user-plus"></i></span>
                        <span class="action-label" data-i18n="dashboard-add-student">Shto Student</span>
                    </button>
                    <button type="button" class="quick-action-card" data-quick-action="professor">
                        <span class="action-icon"><i data-lucide="user-check"></i></span>
                        <span class="action-label" data-i18n="dashboard-add-professor">Shto Profesor</span>
                    </button>
                    <button type="button" class="quick-action-card" data-quick-action="invoice">
                        <span class="action-icon"><i data-lucide="file-text"></i></span>
                        <span class="action-label" data-i18n="dashboard-add-invoice">Shto Faturë</span>
                    </button>
                    <button type="button" class="quick-action-card" data-quick-action="salary">
                        <span class="action-icon"><i data-lucide="briefcase"></i></span>
                        <span class="action-label" data-i18n="dashboard-add-salary">Shto Pagë</span>
                    </button>
                </div>
            </div>

            <div class="dashboard-recent-activity">
                <h3 data-i18n="dashboard-recent-activity">Aktiviteti i fundit</h3>
                <div id="recent-activity-list">
                    <!-- Recent activity will be loaded here -->
                </div>
            </div>
        </div>
    </section>

    <!-- Reports Section -->
    <section class="section" data-section="reports">
        <div class="section-header">
            <button type="button" class="sidebar-toggle">
                <i data-lucide="menu"></i>
            </button>
            <div>
                <h2>
                    <i data-lucide="bar-chart-3" class="section-icon"></i>
                    <span>Raporte</span>
                </h2>
                <p class="section-sub">Pasqyrë financiare dhe performanca e klasave</p>
            </div>
        </div>
        <div class="section-body">
            <div class="reports-summary-grid" id="reports-summary"></div>
            <div class="filters" id="reports-filters"></div>

            <div class="reports-grid">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h4>Faturat e vonuara</h4>
                            <p class="text-muted">Plan mujor i kaluar, status jo “paid”</p>
                        </div>
                        <div class="card-actions">
                            <button type="button" class="secondary" data-report-export="overdue">Eksporto CSV</button>
                        </div>
                    </div>
                    <div class="table-wrapper compact">
                        <table id="reports-overdue-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Studenti</th>
                                    <th>Klasa</th>
                                    <th>Muaji</th>
                                    <th>Detyrimi</th>
                                    <th>Paguar</th>
                                    <th>Statusi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div>
                            <h4>Performanca e klasave</h4>
                            <p class="text-muted">Kapacitet, pagesa dhe orari</p>
                        </div>
                        <div class="card-actions">
                            <button type="button" class="secondary" data-report-export="classes">Eksporto CSV</button>
                        </div>
                    </div>
                    <div class="table-wrapper compact">
                        <table id="reports-classes-table">
                            <thead>
                                <tr>
                                    <th>Klasa</th>
                                    <th>Kursi</th>
                                    <th>Studentë</th>
                                    <th>Profesorë</th>
                                    <th>Pagesa mujore</th>
                                    <th>Paguar</th>
                                    <th>Detyrim</th>
                                    <th>Orari</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" data-section="management">
        <div class="section-header">
            <button type="button" class="sidebar-toggle">
                <i data-lucide="menu"></i>
            </button>
            <div>
                <h2 data-i18n="management-title">
                    <i data-lucide="briefcase" class="section-icon"></i>
                    <span>Menaxhim</span>
                </h2>
                <p class="section-sub" data-i18n="management-subtitle">Pasqyrë e përgjithshme dhe detajet e klasave.</p>
            </div>
        </div>
        <div class="section-body">
            <div class="stat-grid" id="management-stats"></div>

            <div class="entity-switcher">
                <button type="button" class="entity-tab active" data-entity-switch="course" data-i18n="nav-courses">
                    <i data-lucide="graduation-cap" class="entity-icon"></i>
                    <span class="entity-label">Kurse</span>
                </button>
                <button type="button" class="entity-tab" data-entity-switch="class" data-i18n="nav-classes">
                    <i data-lucide="book-open" class="entity-icon"></i>
                    <span class="entity-label">Klasa</span>
                </button>
                <button type="button" class="entity-tab" data-entity-switch="student" data-i18n="nav-students">
                    <i data-lucide="users" class="entity-icon"></i>
                    <span class="entity-label">Studentë</span>
                </button>
                <button type="button" class="entity-tab" data-entity-switch="professor" data-i18n="nav-professors">
                    <i data-lucide="user-check" class="entity-icon"></i>
                    <span class="entity-label">Profesorë</span>
                </button>
            </div>

            <!-- Courses Entity -->
            <div class="card entity-section" data-entity="course">
                <div class="card-header">
                    <div>
                        <h3 data-i18n="registrations-courses">Lista e kurseve</h3>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table id="courses-table" data-entity="courses">
                        <thead>
                            <tr>
                                <th data-i18n="table-id">ID</th>
                                <th data-i18n="table-name">Emër</th>
                                <th data-i18n="table-level">Nivel</th>
                                <th data-i18n="table-price">Çmim</th>
                                <th data-i18n="table-updated">Përditësuar</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

            <!-- Classes Entity -->
            <div class="card entity-section" data-entity="class" style="display: none;">
                <div class="card-header">
                    <div>
                        <h3 data-i18n="registrations-classes">Lista e klasave</h3>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table id="classes-table" data-entity="classes">
                        <thead>
                            <tr>
                                <th data-i18n="table-id">ID</th>
                                <th data-i18n="table-name">Emër</th>
                                <th data-i18n="table-course">Kursi</th>
                                <th data-i18n="table-level">Nivel</th>
                                <th data-i18n="table-period">Periudha</th>
                                <th data-i18n="table-price">Çmim</th>
                                <th data-i18n="table-professors">Profesorë</th>
                                <th data-i18n="table-students">Studentë</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

            <!-- Students Entity -->
            <div class="card entity-section" data-entity="student" style="display: none;">
                <div class="card-header">
                    <div>
                        <h3 data-i18n="registrations-students">Lista e studentëve</h3>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table id="students-table" data-entity="students">
                        <thead>
                            <tr>
                                <th data-i18n="table-id">ID</th>
                                <th data-i18n="table-name">Emër</th>
                                <th data-i18n="table-national">NID</th>
                                <th data-i18n="table-contact">Kontakt</th>
                                <th data-i18n="table-age">Mosha</th>
                                <th data-i18n="table-registered">Regjistruar</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

            <!-- Professors Entity -->
            <div class="card entity-section" data-entity="professor" style="display: none;">
                <div class="card-header">
                    <div>
                        <h3 data-i18n="registrations-professors">Lista e profesorëve</h3>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table id="professors-table" data-entity="professors">
                        <thead>
                            <tr>
                                <th data-i18n="table-id">ID</th>
                                <th data-i18n="table-name">Emër</th>
                                <th data-i18n="table-contact">Kontakt</th>
                                <th data-i18n="table-education">Arsimimi</th>
                                <th data-i18n="table-salary">Paga bazë</th>
                                <th data-i18n="table-actions">Veprime</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

    <section class="section" data-section="payments">
        <div class="section-header">
            <button type="button" class="sidebar-toggle">
                <i data-lucide="menu"></i>
            </button>
            <div>
                <h2 data-i18n="payments-title">Pagesa mujore</h2>
                <p class="section-sub" data-i18n="payments-subtitle">Monitoro faturat e studentëve dhe statuset mujore.
                </p>
            </div>
        </div>
        <div class="filters" id="payment-filters"></div>
        <div class="card">
            <div class="table-wrapper">
                <table id="payments-table" data-entity="payments">
                    <thead>
                        <tr>
                            <th data-i18n="table-id">ID</th>
                            <th data-i18n="table-student">Studenti</th>
                            <th data-i18n="table-class">Klasa</th>
                            <th data-i18n="table-month">Muaji</th>
                            <th data-i18n="label-paid">Paguar</th>
                            <th data-i18n="table-status">Statusi</th>
                            <th data-i18n="table-confirmed">Konfirmuar</th>
                            <th data-i18n="table-receipt">Faturë</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="section" data-section="salaries">
        <div class="section-header">
            <button type="button" class="sidebar-toggle">
                <i data-lucide="menu"></i>
            </button>
            <div>
                <h2 data-i18n="salaries-title">
                    <i data-lucide="wallet" class="section-icon"></i>
                    <span>Paga profesorëve</span>
                </h2>
                <p class="section-sub" data-i18n="salaries-subtitle">Avancat, borxhet dhe bilanci mujore për profesorët.
                </p>
            </div>
        </div>
        <div class="section-body">
            <div class="filters" id="salary-filters"></div>
            <div class="card">
                <div class="card-header">
                    <h3 data-i18n="salaries-list-title">Lista e pagave</h3>
                </div>
                <div class="table-wrapper">
                    <table id="salaries-table" data-entity="salaries">
                        <thead>
                            <tr>
                                <th data-i18n="table-id">ID</th>
                                <th data-i18n="table-professor">Profesori</th>
                                <th data-i18n="table-class">Klasa</th>
                                <th data-i18n="table-month">Muaji</th>
                                <th>Paga</th>
                                <th data-i18n="table-advances">Avanca</th>
                                <th data-i18n="table-status">Statusi</th>
                                <th data-i18n="table-receipt">Faturë</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="section" data-section="settings">
        <div class="section-header">
            <button type="button" class="sidebar-toggle">
                <i data-lucide="menu"></i>
            </button>
            <div>
                <h2 data-i18n="settings-title">Cilësime</h2>
                <p class="section-sub" data-i18n="settings-subtitle">Personalizo preferencat e platformës.</p>
            </div>
        </div>
        <div class="settings-container">
            <form id="settings-main" class="settings-form">
                <div class="settings-section">
                    <h3 data-i18n="settings-business-title">Të dhënat e biznesit</h3>
                    <div class="form-grid">
                        <div class="form-field">
                            <label data-i18n="label-company-name">Emri i kompanisë</label>
                            <input type="text" name="company_name" placeholder="Emri i kompanisë"
                                data-i18n-placeholder="placeholder-company-name">
                        </div>
                        <div class="form-field">
                            <label data-i18n="label-company-address">Adresa</label>
                            <textarea name="company_address" rows="2" placeholder="Rruga, Qyteti, Kodi postar"
                                data-i18n-placeholder="placeholder-address"></textarea>
                        </div>
                        <div class="form-field">
                            <label data-i18n="label-company-phone">Telefoni</label>
                            <input type="text" name="company_phone" placeholder="+355 ..."
                                data-i18n-placeholder="placeholder-phone">
                        </div>
                        <div class="form-field">
                            <label data-i18n="label-company-email">Email</label>
                            <input type="email" name="company_email" placeholder="info@example.com"
                                data-i18n-placeholder="placeholder-email">
                        </div>
                        <div class="form-field">
                            <label data-i18n="label-company-tax-id">NIPT / Nr. fiskal</label>
                            <input type="text" name="company_tax_id" placeholder="NIPT"
                                data-i18n-placeholder="placeholder-tax-id">
                        </div>
                        <div class="form-field">
                            <label data-i18n="label-company-logo-url">Logo (URL ose rrugë relative)</label>
                            <input type="text" name="company_logo_url" placeholder="p.sh. uploads/logo.png"
                                data-i18n-placeholder="placeholder-logo-url">
                        </div>
                        <div class="form-field">
                            <label data-i18n="label-company-logo-upload">Logo (ngarko skedar)</label>
                            <input type="file" name="company_logo_file" accept="image/*,.svg">
                            <div class="upload-actions">
                                <button type="button" class="secondary" data-upload-logo
                                    data-i18n="action-upload-logo">Ngarko logon</button>
                                <small class="help" data-i18n="help-logo-upload">Zgjidh skedarin dhe kliko "Ngarko
                                    logon"</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="settings-section">
                    <h3 data-i18n="settings-app-title">Parametrat e aplikacionit</h3>
                    <div class="form-grid">
                        <div class="form-field">
                            <label for="language_default" data-i18n="label-default-language">Gjuha e paracaktuar</label>
                            <select id="language_default" name="language_default">
                                <option value="sq">Shqip</option>
                                <option value="en">English</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label for="currency" data-i18n="label-currency">Monedha</label>
                            <input type="text" id="currency" name="currency" placeholder="EUR"
                                data-i18n-placeholder="placeholder-currency">
                        </div>
                    </div>
                </div>

                <div class="settings-actions">
                    <button type="submit" class="primary" data-i18n="action-save-settings">Ruaj ndryshimet</button>
                </div>
            </form>

            <div class="settings-extra">
                <button type="button" class="btn-pin-management" id="btn-open-pin-management">
                    <span class="btn-icon">🔐</span>
                    <span data-i18n="btn-pin-management">Menaxhimi i PASSCODE (PIN)</span>
                </button>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>

<!-- Modalet -->
<div class="modal" id="modal-settings-unlock" data-modal>
    <div class="modal-card" style="max-width:420px">
        <h3>PASSCODE i Sigurisë</h3>
        <form id="form-settings-unlock">
            <div class="form-field">
                <label>Shkruaj PASSCODE për të hyrë në cilësime</label>
                <input type="password" name="pin" placeholder="PASSCODE" autocomplete="off" required>
            </div>
            <div class="modal-actions">
                <button type="submit" class="primary">Hap</button>
                <button type="button" class="secondary" data-close>Mbyll</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal për verifikim me kod email -->
<div class="modal" id="modal-pin-verify" data-modal>
    <div class="modal-card" style="max-width: 480px">
        <h3 data-i18n="modal-pin-verify-title">Verifikim me kod</h3>
        <p class="modal-description" data-i18n="modal-pin-verify-description">Shkruani kod-in që u dërgua në email-in
            tuaj për të hyrë në menaxhimin e PASSCODE.</p>
        <form id="pin-verify-form" action="#" method="post">
            <div class="form-field">
                <label data-i18n="label-verification-code">Kodi i verifikimit</label>
                <input type="text" name="verification_code" placeholder="Shkruani kodin" autocomplete="off" required>
                <small class="help" data-i18n="help-verification-code">Kodi u dërgua në email-in tuaj</small>
            </div>
            <div class="modal-actions">
                <button type="submit" class="primary" data-i18n="action-verify">Verifiko</button>
                <button type="button" class="secondary" data-close data-i18n="action-cancel">Anulo</button>
            </div>
        </form>
        <div class="modal-footer">
            <button type="button" class="link" id="btn-resend-code" data-i18n="action-resend-code">Dërgo kodin
                përsëri</button>
        </div>
    </div>
</div>

<!-- Modal për verifikim PIN për veprime -->
<div class="modal" id="modal-action-pin" data-modal>
    <div class="modal-card" style="max-width: 480px">
        <h3>Verifikim PIN</h3>
        <p class="modal-description">Kjo veprim kërkon verifikim me PIN. Shkruani PIN-in tuaj për të vazhduar.</p>
        <form id="action-pin-form">
            <div class="form-field">
                <label data-i18n="label-management-pin">PIN i menaxhimit</label>
                <input type="password" name="pin" id="action-pin-input" autocomplete="new-password"
                    placeholder="Shkruani PIN-in" required>
                <small class="help">Shkruani PIN-in për të verifikuar këtë veprim</small>
            </div>
            <div class="modal-actions">
                <button type="submit" class="primary">Verifiko</button>
                <button type="button" class="secondary" data-close>Anulo</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal për menaxhimin e PASSCODE -->
<div class="modal" id="modal-pin-management" data-modal>
    <div class="modal-card" style="max-width: 95%; max-height: 90vh; overflow-y: auto;">
        <h3 data-i18n="modal-pin-management-title">Menaxhimi i PASSCODE (PIN)</h3>
        <p class="modal-description" data-i18n="modal-pin-management-description">Kontrollo çfarë veprimesh kërkojnë
            PASSCODE për verifikim. Aktivizo ose çaktivizo për çdo veprim. PIN kërkohet çdo herë, nuk mbahet mend.</p>

        <!-- Ndryshimi i PIN-it -->
        <div class="settings-section"
            style="margin: 20px 0; padding: 20px; background: var(--surface); border: 1px solid var(--border); border-radius: 8px;">
            <h4 style="margin-top: 0; display: flex; align-items: center; gap: 0.5rem;">
                <i data-lucide="key" style="width: 18px; height: 18px;"></i>
                <span data-i18n="label-change-pin">Ndrysho PASSCODE</span>
            </h4>
            <div class="form-field">
                <label for="new_pin_modal" data-i18n="label-new-pin">PASSCODE i ri</label>
                <input type="password" id="new_pin_modal" name="new_pin" placeholder="Shkruaj PASSCODE-in e ri"
                    autocomplete="off" data-i18n-placeholder="placeholder-new-pin">
                <small data-i18n="help-new-pin">Lëreni bosh nëse nuk dëshironi ta ndryshoni</small>
            </div>
        </div>

        <!-- Lejet e veprimit -->
        <div id="pin-permissions-grid" class="pin-permissions-grid"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin: 20px 0;">
        </div>

        <div class="modal-actions" style="margin-top: 20px;">
            <button type="button" class="primary" id="btn-save-pin-permissions" data-i18n="action-save">Ruaj
                ndryshimet</button>
            <button type="button" class="secondary" data-close data-i18n="action-cancel">Anulo</button>
        </div>
    </div>
</div>

<div class="modal" id="modal-pin-management-old" data-modal style="display: none;">
    <div class="modal-card" style="max-width:520px">
        <h3>Menaxhimi i PASSCODE</h3>
        <form id="form-pin-management">
            <div class="form-field">
                <label>PASSCODE i ri</label>
                <input type="password" name="new_pin" placeholder="p.sh. 1234" required>
            </div>
            <div class="modal-actions">
                <button type="submit" class="primary">Ruaj</button>
                <button type="button" class="secondary" data-close>Mbyll</button>
            </div>
        </form>
    </div>
</div>
<div class="modal" id="modal-course" data-modal>
    <div class="modal-card">
        <!-- Close icon removed; close via explicit buttons only -->
        <h3 data-i18n="modal-course-title">Kurs i ri</h3>
        <form data-form="course">
            <div class="form-grid">
                <div class="form-field">
                    <label data-i18n="label-course-name">Emri i kursit</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-course-price">Çmimi</label>
                    <input type="number" step="0.01" name="price" required>
                </div>
            </div>
            <div class="form-field">
                <label data-i18n="label-description">Përshkrimi</label>
                <textarea name="description" rows="3" placeholder="Përshkrimi i kursit (opsionale)"></textarea>
            </div>
            <div class="modal-actions">
                <button type="submit" class="primary" data-i18n="action-save">Ruaj</button>
                <button type="button" class="secondary" data-close data-i18n="action-cancel">Anulo</button>
            </div>
        </form>
    </div>
</div>

<div class="modal" id="modal-class" data-modal>
    <div class="modal-card">
        <!-- Close icon removed; close via explicit buttons only -->
        <h3 data-i18n="modal-class-title">Klasë e re</h3>
        <form data-form="class">
            <div class="form-grid">
                <div class="form-field">
                    <label data-i18n="label-class-course">Kursi</label>
                    <select name="course_public_id" required></select>
                </div>
                <div class="form-field">
                    <label data-i18n="label-class-name">Emri i klasës</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-class-level">Niveli</label>
                    <input type="text" name="level" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-class-start">Data e fillimit</label>
                    <input type="date" name="start_date" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-class-end">Data e mbarimit</label>
                    <input type="date" name="end_date">
                </div>
                <div class="form-field">
                    <label data-i18n="label-class-price">Pagesa mujore</label>
                    <input type="number" step="0.01" name="monthly_price" placeholder="Merret automatikisht nga kursi"
                        readonly>
                </div>
            </div>
            <fieldset class="form-field">
                <legend data-i18n="label-class-schedule">Orari (ditët dhe orët)</legend>
                <div class="weekday-grid">
                    <?php $days = [
                        ['key' => 'mon', 'label' => 'E hënë'],
                        ['key' => 'tue', 'label' => 'E martë'],
                        ['key' => 'wed', 'label' => 'E mërkurë'],
                        ['key' => 'thu', 'label' => 'E enjte'],
                        ['key' => 'fri', 'label' => 'E premte'],
                        ['key' => 'sat', 'label' => 'E shtunë'],
                        ['key' => 'sun', 'label' => 'E diel']
                    ];
                    foreach ($days as $d): ?>
                        <div class="weekday-row">
                            <label>
                                <input type="checkbox" name="schedule_days[]" value="<?= $d['key'] ?>">
                                <span><?= $d['label'] ?></span>
                            </label>
                            <input type="time" name="schedule_<?= $d['key'] ?>_start" placeholder="08:00">
                            <span>–</span>
                            <input type="time" name="schedule_<?= $d['key'] ?>_end" placeholder="10:00">
                        </div>
                    <?php endforeach; ?>
                </div>
            </fieldset>
            <div class="subform" data-subform="professors">
                <h4 data-i18n="label-class-professors">Profesorët</h4>
                <div class="form-field">
                    <select name="professors[]" multiple></select>
                    <div class="selected-chips" data-chips="professors"></div>
                    <small class="help" data-i18n="help-multiselect">Mbaj CTRL ose CMD për të zgjedhur disa.</small>
                </div>
            </div>
            <div class="form-field">
                <label>Pagesa e profesorit (për klasë)</label>
                <input type="number" step="0.01" name="professor_class_pay" placeholder="p.sh. 2000">
                <small class="help">Opsionale. Përdoret për pagat “Per klasë”.</small>
            </div>
            <div class="subform" data-subform="students">
                <h4 data-i18n="label-class-students">Studentët</h4>
                <div class="form-field">
                    <select name="students[]" multiple></select>
                    <div class="selected-chips" data-chips="students"></div>
                    <small class="help" data-i18n="help-multiselect">Mbaj CTRL ose CMD për të zgjedhur disa.</small>
                </div>
            </div>
            <div class="form-field">
                <label data-i18n="label-description">Përshkrimi</label>
                <textarea name="description" rows="3"></textarea>
            </div>
            <div class="modal-actions">
                <button type="submit" class="primary" data-i18n="action-save">Ruaj</button>
                <button type="button" class="secondary" data-close data-i18n="action-cancel">Anulo</button>
            </div>
        </form>
    </div>
</div>

<div class="modal" id="modal-student" data-modal>
    <div class="modal-card">
        <!-- Close icon removed; close via explicit buttons only -->
        <h3 data-i18n="modal-student-title">Student i ri</h3>
        <form data-form="student">
            <div class="form-grid">
                <div class="form-field">
                    <label data-i18n="label-first-name">Emri</label>
                    <input type="text" name="first_name" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-last-name">Mbiemri</label>
                    <input type="text" name="last_name" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-parent-name">Emri i prindit</label>
                    <input type="text" name="parent_name">
                </div>
                <div class="form-field">
                    <label data-i18n="label-national-id">Numri i identitetit</label>
                    <input type="text" name="national_id" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-phone">Telefoni</label>
                    <input type="tel" name="phone" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-parent-phone">Telefoni i prindit</label>
                    <input type="tel" name="parent_phone">
                </div>
                <div class="form-field">
                    <label data-i18n="label-email">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="form-field">
                    <label data-i18n="label-age">Mosha</label>
                    <input type="number" name="age" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-registration-date">Data e regjistrimit</label>
                    <input type="date" name="registration_date" required>
                </div>
            </div>
            <div class="form-field">
                <label data-i18n="label-address">Adresa</label>
                <textarea name="address" rows="2"></textarea>
            </div>
            <div class="form-field">
                <label data-i18n="label-skills">Shkathtësitë</label>
                <textarea name="skills" rows="2"></textarea>
            </div>
            <div class="form-field">
                <label data-i18n="label-description">Përshkrimi</label>
                <textarea name="description" rows="2"></textarea>
            </div>
            <div class="modal-actions">
                <button type="submit" class="primary" data-i18n="action-save">Ruaj</button>
                <button type="button" class="secondary" data-close data-i18n="action-cancel">Anulo</button>
            </div>
        </form>
    </div>
</div>

<div class="modal" id="modal-professor" data-modal>
    <div class="modal-card">
        <!-- Close icon removed; close via explicit buttons only -->
        <h3 data-i18n="modal-professor-title">Profesor i ri</h3>
        <form data-form="professor">
            <div class="form-grid">
                <div class="form-field">
                    <label data-i18n="label-first-name">Emri</label>
                    <input type="text" name="first_name" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-last-name">Mbiemri</label>
                    <input type="text" name="last_name" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-national-id">Numri i identitetit</label>
                    <input type="text" name="national_id">
                </div>
                <div class="form-field">
                    <label data-i18n="label-email">Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-phone">Telefoni</label>
                    <input type="tel" name="phone" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-salary-type">Tipi i pagesës</label>
                    <select name="salary_type" required>
                        <option value="monthly">Mujore</option>
                        <option value="per-class">Per klasë</option>
                    </select>
                </div>
                <div class="form-field">
                    <label data-i18n="label-base-salary">Shuma</label>
                    <input type="number" step="0.01" name="base_salary" required>
                </div>
            </div>
            <div class="form-field">
                <label data-i18n="label-address">Adresa</label>
                <textarea name="address" rows="2"></textarea>
            </div>
            <div class="form-field">
                <label data-i18n="label-education">Niveli shkollimit</label>
                <textarea name="education" rows="2"></textarea>
            </div>
            <div class="form-field">
                <label data-i18n="label-description">Përshkrimi</label>
                <textarea name="description" rows="2"></textarea>
            </div>
            <div class="modal-actions">
                <button type="submit" class="primary" data-i18n="action-save">Ruaj</button>
                <button type="button" class="secondary" data-close data-i18n="action-cancel">Anulo</button>
            </div>
        </form>
    </div>
</div>

<div class="modal" id="modal-invoice" data-modal>
    <div class="modal-card">
        <!-- Close icon removed; close via explicit buttons only -->
        <h3 data-i18n="modal-invoice-title">Faturë student</h3>
        <form data-form="invoice">
            <div class="form-grid">
                <div class="form-field">
                    <label data-i18n="label-student">Studenti</label>
                    <select name="student_public_id" id="invoice-student" required></select>
                </div>
                <div class="form-field">
                    <label data-i18n="label-class">Klasa</label>
                    <select name="class_public_id" id="invoice-class" required></select>
                </div>
                <div class="form-field">
                    <label data-i18n="label-month">Muaji</label>
                    <select name="plan_month[]" id="invoice-months" multiple required></select>
                </div>
                <div class="form-field">
                    <label data-i18n="label-tax">Tarifa tatimore</label>
                    <select name="tax" id="invoice-tax">
                        <option value="none" data-i18n="tax-none">Pa Tatim</option>
                        <option value="vat8" data-i18n="tax-vat8">Tvsh 8%</option>
                        <option value="vat18" data-i18n="tax-vat18">Tvsh 18%</option>
                        <option value="exempt" data-i18n="tax-exempt">Tvsh e Liruar</option>
                    </select>
                </div>
                <div class="form-field">
                    <label data-i18n="label-amount">Shuma</label>
                    <input type="number" step="0.01" name="due_amount" id="invoice-amount" readonly required>
                    <small class="help">Llogaritet automatikisht sipas muajve të zgjedhur</small>
                </div>
                <div class="form-field">
                    <label data-i18n="label-paid">Paguar</label>
                    <input type="number" step="0.01" name="paid_amount" value="0">
                </div>
                <div class="form-field">
                    <label data-i18n="label-status">Statusi</label>
                    <select name="status" id="invoice-status" disabled>
                        <option value="partial">Partial</option>
                        <option value="paid">Paguar</option>
                    </select>
                </div>
            </div>
            <div class="form-field">
                <label data-i18n="label-notes">Shënime</label>
                <textarea name="notes" rows="2"></textarea>
            </div>
            <div class="form-field">
                <!-- PIN removed per request -->
            </div>
            <div class="modal-actions">
                <button type="submit" class="primary" data-i18n="action-save">Ruaj</button>
                <button type="button" class="secondary" data-close data-i18n="action-cancel">Anulo</button>
            </div>
        </form>
    </div>
</div>

<div class="modal" id="modal-salary" data-modal>
    <div class="modal-card">
        <!-- Close icon removed; close via explicit buttons only -->
        <h3 data-i18n="modal-salary-title">Deklaratë page</h3>
        <form data-form="salary">
            <div class="form-grid">
                <div class="form-field">
                    <label data-i18n="label-professor">Profesori</label>
                    <select name="professor_public_id" required></select>
                </div>
                <div class="form-field">
                    <label data-i18n="label-class">Klasa</label>
                    <select name="class_public_id"></select>
                </div>
                <div class="form-field">
                    <label data-i18n="label-month">Muaji</label>
                    <input type="month" name="pay_month" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-base-salary">Paga bazë</label>
                    <input type="number" step="0.01" name="base_amount" required>
                </div>
                <div class="form-field">
                    <label data-i18n="label-advances">Avancat</label>
                    <input type="number" step="0.01" name="advances" value="0">
                </div>
                <div class="form-field">
                    <label data-i18n="label-paid">Paguar</label>
                    <input type="number" step="0.01" name="paid_amount" value="0">
                </div>
                <div class="form-field">
                    <label>Borxhi i mbetur</label>
                    <input type="text" id="salary-remaining-amount" readonly>
                </div>
                <div class="form-field">
                    <!-- balance removed -->
                </div>
                <div class="form-field">
                    <label data-i18n="label-status">Statusi</label>
                    <select name="status">
                        <option value="due">Borxh</option>
                        <option value="partial">Partial</option>
                        <option value="paid">Paguar</option>
                    </select>
                </div>
            </div>
            <div class="form-field">
                <label data-i18n="label-notes">Shënime</label>
                <textarea name="notes" rows="2"></textarea>
            </div>
            <div class="form-field">
                <!-- PIN removed per request -->
            </div>
            <div class="modal-actions">
                <button type="submit" class="primary" data-i18n="action-save">Ruaj</button>
                <button type="button" class="secondary" data-close data-i18n="action-cancel">Anulo</button>
            </div>
        </form>
    </div>
</div>

<div class="modal" id="modal-class-details" data-modal>
    <div class="modal-card class-details-modal">
        <!-- Close icon removed; close via explicit buttons only -->
        <div class="class-details-header">
            <h3 data-i18n="modal-class-details-title">Detajet e klasës</h3>
            <span class="class-details-id"></span>
        </div>
        <div class="class-details-content">
            <div class="details-grid">
                <div class="details-section">
                    <h4 data-i18n="class-details-basic">Informacione bazë</h4>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="label-class-name">Emri i klasës</span>
                        <span class="detail-value class-name"></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="label-class-course">Kursi</span>
                        <span class="detail-value class-course"></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="label-class-level">Niveli</span>
                        <span class="detail-value class-level"></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="label-class-price">Pagesa mujore</span>
                        <span class="detail-value class-price"></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="label-class-period">Periudha</span>
                        <span class="detail-value class-period"></span>
                    </div>
                </div>

                <div class="details-section">
                    <h4 data-i18n="class-details-schedule">Orari</h4>
                    <div class="class-schedule"></div>
                </div>

                <div class="details-section">
                    <h4 data-i18n="class-details-professors">Profesorët</h4>
                    <div class="class-professors"></div>
                </div>

                <div class="details-section">
                    <h4 data-i18n="class-details-students">Studentët</h4>
                    <div class="class-students"></div>
                </div>

                <div class="details-section">
                    <h4 data-i18n="class-details-description">Përshkrimi</h4>
                    <div class="class-description"></div>
                </div>

                <div class="details-section">
                    <h4 data-i18n="class-details-payment-plan">Plani i pagesave</h4>
                    <div class="class-payment-plan"></div>
                </div>

                <div class="details-section">
                    <h4 data-i18n="class-details-invoices">Pagesat / Faturat</h4>
                    <div class="class-invoices"></div>
                </div>
            </div>
        </div>
        <div class="modal-actions">
            <button type="button" class="primary" data-class-edit data-i18n="action-edit">Ndrysho</button>
            <button type="button" class="secondary" data-close data-i18n="action-close">Mbyll</button>
        </div>
    </div>
</div>

<div class="modal" id="modal-student-details" data-modal>
    <div class="modal-card class-details-modal">
        <!-- Close icon removed; close via explicit buttons only -->
        <div class="class-details-header">
            <h3>Detajet e studentit</h3>
            <span class="student-details-id"></span>
        </div>
        <div class="class-details-content">
            <div class="details-grid">
                <div class="details-section">
                    <h4 data-i18n="class-details-basic">Informacione bazë</h4>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="table-name">Emër</span>
                        <span class="detail-value student-name"></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="table-national">NID</span>
                        <span class="detail-value student-nid"></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="label-age">Mosha</span>
                        <span class="detail-value student-age"></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="label-registration-date">Data e regjistrimit</span>
                        <span class="detail-value student-registered"></span>
                    </div>
                </div>
                <div class="details-section">
                    <h4 data-i18n="table-contact">Kontakt</h4>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-phone">Telefoni</span> <span
                            class="detail-value student-phone"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-email">Email</span> <span
                            class="detail-value student-email"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-address">Adresa</span> <span
                            class="detail-value student-address"></span></div>
                </div>
                <div class="details-section">
                    <h4>Informacione shtesë</h4>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-parent-name">Emri i
                            prindit</span> <span class="detail-value student-parent-name"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-parent-phone">Telefoni i
                            prindit</span> <span class="detail-value student-parent-phone"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-skills">Shkathtësitë</span>
                        <span class="detail-value student-skills"></span>
                    </div>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-description">Përshkrimi</span>
                        <span class="detail-value student-description"></span>
                    </div>
                </div>
                <div class="details-section">
                    <h4 data-i18n="registrations-classes">Lista e klasave</h4>
                    <div class="student-classes"></div>
                </div>
                <div class="details-section">
                    <h4 data-i18n="payments-title">Pagesa mujore</h4>
                    <div class="student-invoices"></div>
                </div>
            </div>
        </div>
        <div class="modal-actions">
            <button type="button" class="secondary" data-close data-i18n="action-close">Mbyll</button>
        </div>
    </div>
</div>

<div class="modal" id="modal-invoice-details" data-modal>
    <div class="modal-card class-details-modal">
        <!-- Close icon removed; close via explicit buttons only -->
        <div class="class-details-header">
            <h3 data-i18n="modal-invoice-details-title">Detajet e pagesës</h3>
            <span class="invoice-details-id"></span>
        </div>
        <div class="class-details-content">
            <div class="details-grid">
                <div class="details-section">
                    <h4 data-i18n="class-details-basic">Informacione bazë</h4>
                    <div class="detail-item"><span class="detail-label" data-i18n="table-student">Studenti</span> <span
                            class="detail-value invoice-student"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="table-class">Klasa</span> <span
                            class="detail-value invoice-class"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="table-month">Muaji</span> <span
                            class="detail-value invoice-month"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="table-amount">Shuma</span> <span
                            class="detail-value invoice-due"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-tax">Tarifa tatimore</span>
                        <span class="detail-value invoice-tax"></span>
                    </div>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-paid">Paguar</span> <span
                            class="detail-value invoice-paid"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="table-status">Statusi</span> <span
                            class="detail-value invoice-status"></span></div>
                </div>
                <div class="details-section">
                    <h4 data-i18n="label-notes">Shënime</h4>
                    <div class="invoice-notes"></div>
                </div>
            </div>
        </div>
        <div class="modal-actions">
            <button type="button" class="secondary" data-close data-i18n="action-close">Mbyll</button>
            <button type="button" class="primary" data-invoice-print data-i18n="action-print">Printo</button>
        </div>
    </div>
</div>

<div class="modal" id="modal-professor-details" data-modal>
    <div class="modal-card class-details-modal">
        <!-- Close icon removed; close via explicit buttons only -->
        <div class="class-details-header">
            <h3>Detajet e profesorit</h3>
            <span class="professor-details-id"></span>
        </div>
        <div class="class-details-content">
            <div class="details-grid">
                <div class="details-section">
                    <h4 data-i18n="class-details-basic">Informacione bazë</h4>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="table-name">Emër</span>
                        <span class="detail-value professor-name"></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="label-national-id">Numri i identitetit</span>
                        <span class="detail-value professor-national"></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="label-salary">Paga</span>
                        <span class="detail-value professor-salary"></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label" data-i18n="label-salary-type">Tipi i pagesës</span>
                        <span class="detail-value professor-salary-type"></span>
                    </div>
                </div>
                <div class="details-section">
                    <h4 data-i18n="table-contact">Kontakt</h4>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-phone">Telefoni</span> <span
                            class="detail-value professor-phone"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-email">Email</span> <span
                            class="detail-value professor-email"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-address">Adresa</span> <span
                            class="detail-value professor-address"></span></div>
                </div>
                <div class="details-section">
                    <h4 data-i18n="table-education">Arsimimi</h4>
                    <div class="detail-item"><span class="detail-label" data-i18n="table-education">Arsimimi</span>
                        <span class="detail-value professor-education"></span>
                    </div>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-biography">Biografia</span>
                        <span class="detail-value professor-bio"></span>
                    </div>
                </div>
                <div class="details-section">
                    <h4 data-i18n="registrations-classes">Lista e klasave</h4>
                    <div class="professor-classes"></div>
                </div>
                <div class="details-section">
                    <h4 data-i18n="salaries-title">Paga profesorëve</h4>
                    <div class="professor-salaries"></div>
                </div>
            </div>
        </div>
        <div class="modal-actions">
            <button type="button" class="secondary" data-close data-i18n="action-close">Mbyll</button>
        </div>
    </div>
</div>

<div class="modal" id="modal-salary-details" data-modal>
    <div class="modal-card class-details-modal">
        <!-- Close icon removed; close via explicit buttons only -->
        <div class="class-details-header">
            <h3>Detajet e pagës</h3>
            <span class="salary-details-id"></span>
        </div>
        <div class="class-details-content">
            <div class="details-grid">
                <div class="details-section">
                    <h4 data-i18n="class-details-basic">Informacione bazë</h4>
                    <div class="detail-item"><span class="detail-label" data-i18n="table-professor">Profesori</span>
                        <span class="detail-value salary-professor"></span>
                    </div>
                    <div class="detail-item"><span class="detail-label" data-i18n="table-class">Klasa</span> <span
                            class="detail-value salary-class"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="table-month">Muaji</span> <span
                            class="detail-value salary-month"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-base-salary">Paga bazë</span>
                        <span class="detail-value salary-base"></span>
                    </div>
                    <div class="detail-item"><span class="detail-label" data-i18n="table-advances">Avancat</span> <span
                            class="detail-value salary-advances"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="label-paid">Paguar</span> <span
                            class="detail-value salary-paid"></span></div>
                    <div class="detail-item"><span class="detail-label" data-i18n="table-status">Statusi</span> <span
                            class="detail-value salary-status"></span></div>
                </div>
                <div class="details-section">
                    <h4 data-i18n="label-notes">Shënime</h4>
                    <div class="salary-notes"></div>
                </div>
            </div>
        </div>
        <div class="modal-actions">
            <button type="button" class="secondary" data-close data-i18n="action-close">Mbyll</button>
            <button type="button" class="primary" data-salary-print data-i18n="action-print">Printo</button>
        </div>
    </div>
</div>