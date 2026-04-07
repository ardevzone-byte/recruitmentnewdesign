<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
        :root {
            --bg-body: #f1f5f9;
            --bg-card: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            
            /* Section Colors */
            --col-interview-bg: #eff6ff;
            --col-interview-text: #1d4ed8;
            --col-approval-bg: #fff7ed;
            --col-approval-text: #c2410c;
            --col-offer-bg: #f0fdf4;
            --col-offer-text: #15803d;
            
            --sticky-col-bg: #f8fafc;
            --header-bg: #ffffff;
        }

        .ceo-team-report-embed {
            background-color: var(--bg-body);
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* --- CARD CONTAINER --- */
        .report-card {
            background: var(--bg-card);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
        }

        .report-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
        }

        /* --- MATRIX SCROLL AREA --- */
        .matrix-wrapper {
            position: relative;
            overflow: auto;
            max-height: 75vh;
            /* Smooth scrolling for mobile */
            -webkit-overflow-scrolling: touch; 
        }

        /* --- TABLE STYLING --- */
        .modern-table {
            width: 100%;
            border-collapse: separate; /* Essential for sticky headers */
            border-spacing: 0;
            min-width: 1200px; /* Force scroll on small screens */
        }

        /* sticky header */
        .modern-table thead th {
            position: sticky;
            top: 0;
            background: var(--header-bg);
            z-index: 20;
            padding: 1rem 0.75rem;
            font-size: 0.85rem;
            font-weight: 600;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
            border-right: 1px solid var(--border-color);
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        /* Main Category Headers */
        .th-main {
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 0.75rem !important;
            padding: 8px !important;
        }

        .cat-interviews { background: var(--col-interview-bg) !important; color: var(--col-interview-text); }
        .cat-approvals  { background: var(--col-approval-bg) !important; color: var(--col-approval-text); }
        .cat-offers     { background: var(--col-offer-bg) !important; color: var(--col-offer-text); }

        /* Job Title Headers - Row 2 */
        .th-job {
            top: 40px !important; /* Push down */
            font-weight: 500 !important;
            color: var(--text-muted);
            white-space: nowrap;
            max-width: 140px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* --- STICKY COLUMNS (Left) --- */
        .sticky-col {
            position: sticky;
            left: 0;
            background: var(--sticky-col-bg);
            z-index: 30;
            border-right: 1px solid var(--border-color);
        }

        .sticky-col-1 { left: 0; width: 60px; min-width: 60px; text-align: center; }
        .sticky-col-2 { 
            left: 60px; 
            width: 180px; 
            min-width: 180px; 
            text-align: left; 
            padding-left: 1rem !important;
            /* The Shadow Effect */
            box-shadow: 4px 0 12px -4px rgba(0,0,0,0.1); 
            border-right: 2px solid #cbd5e1 !important;
        }

        /* High z-index for the corner headers */
        thead .sticky-col { z-index: 40 !important; background: #f8fafc; color: var(--text-main); }
        thead tr:nth-child(2) .sticky-col { top: 40px !important; }

        /* --- CELLS --- */
        .modern-table td {
            padding: 0.85rem 0.5rem;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
            border-right: 1px solid #f1f5f9;
            font-size: 0.95rem;
            vertical-align: middle;
            transition: background 0.2s;
        }
        
        /* Row Hover */
        .modern-table tbody tr:hover td {
            background-color: #f8fafc;
        }
        .modern-table tbody tr:hover td.sticky-col {
            background-color: #f1f5f9;
        }

        /* Section Borders */
        .section-end {
            border-right: 2px solid #cbd5e1 !important;
        }

        /* Values */
        .val-zero { color: #e2e8f0; font-size: 0.8rem; font-weight: 300; }
        .val-data { font-weight: 700; font-size: 1rem; }
        
        .text-int { color: var(--col-interview-text); }
        .text-app { color: var(--col-approval-text); }
        .text-off { color: var(--col-offer-text); }

        /* --- MOBILE OPTIMIZATIONS --- */
        @media (max-width: 768px) {
            .report-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
                padding: 1rem;
            }
            
            /* Shrink Sticky Cols on Mobile */
            .sticky-col-1 { display: none; } /* Hide ID on small screens */
            .sticky-col-2 { left: 0; width: 140px; min-width: 140px; font-size: 0.85rem; }
            
            .th-job { max-width: 100px; font-size: 0.75rem; }
        }

        /* Print Styles */
        @media print {
            .matrix-wrapper { overflow: visible; max-height: none; }
            .report-card { border: none; box-shadow: none; }
            button, .btn { display: none; }
            .ceo-team-report-embed { background: white; }
        }
    </style>
<div class="rows col-12 jobs-dashboard ceo-team-report-embed" dir="ltr">
<div class="container-fluid py-4 px-md-4">
    
    <div class="d-flex align-items-center mb-4">
        <a href="<?= base_url('dashboard') ?>" class="text-decoration-none text-muted small fw-bold">
            <i class="fas fa-chevron-left me-1"></i> DASHBOARD
        </a>
    </div>

    <div class="report-card">
        <div class="report-header">
            <div>
                <h4 class="mb-1 fw-bold text-dark">Team Performance Matrix</h4>
                <p class="mb-0 text-muted small">
                    <i class="far fa-calendar-alt me-1"></i> Data live from system
                </p>
            </div>
            <div class="d-flex gap-2">
                <button onclick="window.print()" class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-bold">
                    <i class="fas fa-print me-2"></i> Print
                </button>
            </div>
        </div>

        <div class="matrix-wrapper">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th class="sticky-col sticky-col-1" rowspan="2">ID</th>
                        <th class="sticky-col sticky-col-2" rowspan="2">EMPLOYEE</th>
                        
                        <th class="th-main cat-interviews section-end" colspan="<?= count($job_columns) ?>">
                            <i class="fas fa-comments me-1"></i> Interviews
                        </th>
                        
                        <th class="th-main cat-approvals section-end" colspan="<?= count($job_columns) ?>">
                            <i class="fas fa-check-double me-1"></i> Approvals
                        </th>
                        
                        <th class="th-main cat-offers" colspan="<?= count($job_columns) ?>">
                            <i class="fas fa-file-contract me-1"></i> Offers
                        </th>
                    </tr>

                    <tr>
                        <?php 
                        $total_cols = count($job_columns);
                        $last_idx = $total_cols - 1;
                        
                        // 1. Interviews
                        foreach($job_columns as $idx => $job): ?>
                            <th class="th-job <?= $idx == $last_idx ? 'section-end' : '' ?>" title="<?= $job['job_title'] ?>">
                                <?= mb_strimwidth($job['job_title'], 0, 18, "..") ?>
                            </th>
                        <?php endforeach; 
                        
                        // 2. Approvals
                        foreach($job_columns as $idx => $job): ?>
                            <th class="th-job <?= $idx == $last_idx ? 'section-end' : '' ?>" title="<?= $job['job_title'] ?>">
                                <?= mb_strimwidth($job['job_title'], 0, 18, "..") ?>
                            </th>
                        <?php endforeach; 

                        // 3. Offers
                        foreach($job_columns as $job): ?>
                            <th class="th-job" title="<?= $job['job_title'] ?>">
                                <?= mb_strimwidth($job['job_title'], 0, 18, "..") ?>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($team_users as $user): ?>
                        <tr>
                            <td class="sticky-col sticky-col-1 fw-bold text-muted small">
                                <?= $user['username'] ?>
                            </td>
                            <td class="sticky-col sticky-col-2 fw-bold text-dark">
                                <?= $user['name'] ?>
                            </td>

                            <?php foreach($job_columns as $idx => $job): ?>
                                <?php $val = $matrix_data[$user['id']][$job['id']]['interviews'] ?? 0; ?>
                                <td class="<?= $idx == $last_idx ? 'section-end' : '' ?>">
                                    <span class="<?= $val > 0 ? 'val-data text-int' : 'val-zero' ?>">
                                        <?= $val > 0 ? $val : '0' ?>
                                    </span>
                                </td>
                            <?php endforeach; ?>

                            <?php foreach($job_columns as $idx => $job): ?>
                                <?php $val = $matrix_data[$user['id']][$job['id']]['approvals'] ?? 0; ?>
                                <td class="<?= $idx == $last_idx ? 'section-end' : '' ?>">
                                    <span class="<?= $val > 0 ? 'val-data text-app' : 'val-zero' ?>">
                                        <?= $val > 0 ? $val : '0' ?>
                                    </span>
                                </td>
                            <?php endforeach; ?>

                            <?php foreach($job_columns as $job): ?>
                                <?php $val = $matrix_data[$user['id']][$job['id']]['offers'] ?? 0; ?>
                                <td>
                                    <span class="<?= $val > 0 ? 'val-data text-off' : 'val-zero' ?>">
                                        <?= $val > 0 ? $val : '0' ?>
                                    </span>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>

                    <tr style="background-color: #1e293b;">
                        <td class="sticky-col sticky-col-1" style="background: #0f172a; color: white; border: none;"></td>
                        <td class="sticky-col sticky-col-2 text-end pe-3" style="background: #0f172a; color: white; border: none;">
                            TOTALS
                        </td>

                        <?php foreach($job_columns as $idx => $job): ?>
                            <?php $sum = 0; foreach($team_users as $u) $sum += $matrix_data[$u['id']][$job['id']]['interviews'] ?? 0; ?>
                            <td class="<?= $idx == $last_idx ? 'section-end' : '' ?>" style="background: #1e293b; color: white; border-color: #334155;">
                                <span class="<?= $sum > 0 ? 'fw-bold' : 'text-muted' ?>"><?= $sum > 0 ? $sum : '-' ?></span>
                            </td>
                        <?php endforeach; ?>

                        <?php foreach($job_columns as $idx => $job): ?>
                            <?php $sum = 0; foreach($team_users as $u) $sum += $matrix_data[$u['id']][$job['id']]['approvals'] ?? 0; ?>
                            <td class="<?= $idx == $last_idx ? 'section-end' : '' ?>" style="background: #1e293b; color: white; border-color: #334155;">
                                <span class="<?= $sum > 0 ? 'fw-bold' : 'text-muted' ?>"><?= $sum > 0 ? $sum : '-' ?></span>
                            </td>
                        <?php endforeach; ?>

                        <?php foreach($job_columns as $job): ?>
                            <?php $sum = 0; foreach($team_users as $u) $sum += $matrix_data[$u['id']][$job['id']]['offers'] ?? 0; ?>
                            <td style="background: #1e293b; color: white; border-color: #334155;">
                                <span class="<?= $sum > 0 ? 'fw-bold' : 'text-muted' ?>"><?= $sum > 0 ? $sum : '-' ?></span>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="bg-light p-3 border-top small text-muted d-flex justify-content-between">
            <span>Generated for CEO (User 1001)</span>
            <span><?= date('Y-m-d H:i') ?></span>
        </div>
    </div>
</div>
</div>
