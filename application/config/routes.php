<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = "users/login";

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;

$route['email'] = 'Users';
$route['users/candidates/approved/direct'] = 'users/candidates_approved_by_direct_date';
$route['users/candidates/approved/direct/export'] = 'users/candidates_export_by_direct_date';
// Add this route if not exists
$route['dashboard/search_candidates_ajax'] = 'dashboard/search_candidates_ajax';
$route['OnboardingNotify'] = 'OnboardingNotify/index';
$route['OnboardingNotify/send'] = 'OnboardingNotify/send';
$route['OnboardingNotify/dept_save'] = 'OnboardingNotify/dept_save';
$route['OnboardingNotify/dept_delete/(:num)'] = 'OnboardingNotify/dept_delete/$1';
$route['OnboardingNotify/ajax_search_offers'] = 'OnboardingNotify/ajax_search_offers';
$route['OnboardingNotify/ajax_preview_payload'] = 'OnboardingNotify/ajax_preview_payload';

$route['CandidateAttachments']        = 'CandidateAttachments/index';
$route['CandidateAttachments/search'] = 'CandidateAttachments/search';
$route['CandidateAttachments/upload'] = 'CandidateAttachments/upload';
$route['CandidateEvaluations'] = 'CandidateEvaluations/index';
$route['CandidateEvaluations/search'] = 'CandidateEvaluations/search';
$route['CandidateEvaluations/create'] = 'CandidateEvaluations/create';
$route['CandidateEvaluations/update/(:num)'] = 'CandidateEvaluations/update/$1';
$route['CandidateEvaluations/delete/(:num)'] = 'CandidateEvaluations/delete/$1';

$route['CandidateEvaluations2'] = 'CandidateEvaluations2/index';
$route['CandidateEvaluations2/search'] = 'CandidateEvaluations2/search';
$route['CandidateEvaluations2/select/(:num)'] = 'CandidateEvaluations2/select/$1';
$route['CandidateEvaluations2/create'] = 'CandidateEvaluations2/create';
$route['CandidateEvaluations2/update/(:num)'] = 'CandidateEvaluations2/update/$1';
$route['CandidateEvaluations2/delete/(:num)'] = 'CandidateEvaluations2/delete/$1';
$route['JobTitles'] = 'JobTitles/index';
$route['JobTitles/create'] = 'JobTitles/create';
$route['JobTitles/update/(:num)'] = 'JobTitles/update/$1';
$route['JobTitles/delete/(:num)'] = 'JobTitles/delete/$1';
$route['InterviewReport'] = 'InterviewReport/index';
$route['InterviewReport/export_csv'] = 'InterviewReport/export_csv';

$route['MdPendingEvaluations'] = 'MdPendingEvaluations/index';
$route['MdPendingEvaluations/export_csv'] = 'MdPendingEvaluations/export_csv';


$route['seed/job_descriptions'] = 'Seed/job_descriptions';
$route['job_description']                   = 'JobDescription/index';
$route['job_description/create']            = 'JobDescription/create';
$route['job_description/store']             = 'JobDescription/store';
$route['job_description/view/(:num)']       = 'JobDescription/view/$1';
$route['job_description/approve/(:num)']    = 'JobDescription/approve/$1';
$route['job_description/sign/(:num)']       = 'JobDescription/sign/$1';
$route['job_description/export_pdf/(:num)'] = 'JobDescription/export_pdf/$1';



$route['JobOffersReport'] = 'JobOffersReport/index';
$route['JobOffersReport/ajax_list'] = 'JobOffersReport/ajax_list';

$route['SmsPlatform'] = 'SmsPlatform/index';
$route['SmsPlatform/send'] = 'SmsPlatform/send';
$route['SmsPlatform/dashboard'] = 'SmsPlatform/dashboard';
$route['SmsPlatform/details/(:num)'] = 'SmsPlatform/details/$1';
$route['SmsPlatform/export_csv'] = 'SmsPlatform/export_csv';
$route['SmsPlatform/export_recipients_csv/(:num)'] = 'SmsPlatform/export_recipients_csv/$1';

$route['jobs/view/(:num)'] = 'Jobs/view/$1';
$route['candidates'] = 'Candidates/archive';
$route['offers'] = 'Offers/dashboard';
$route['candidates/regions'] = 'Candidates_regions_report/index';
$route['candidates/regions/update/(:num)'] = 'Candidates_regions_report/update/$1';


















