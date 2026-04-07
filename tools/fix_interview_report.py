# -*- coding: utf-8 -*-
path = "application/views/recruitment/interview_report.php"
with open(path, "r", encoding="utf-8") as f:
    lines = f.readlines()

style = """<style>
.interview-report-embed { color: #181a3b; }
.interview-report-embed .wrap { max-width: 100%; margin: 0; padding: 0; }
.interview-report-embed .header { background: #fff; border: 1px solid #e5e7eb; border-radius: 16px; padding: 16px; margin-bottom: 16px; }
.interview-report-embed h1 { color: #181a3b; font-weight: 800; -webkit-text-fill-color: #181a3b; }
.interview-report-embed .sub { color: #6b7280; }
.interview-report-embed .section { background: transparent; border: 0; box-shadow: none; padding: 0; }
.interview-report-embed .section::before { display: none; }
.interview-report-embed .cardx { background: #fff; border: 1px solid #e5e7eb; border-radius: 16px; color: #181a3b; }
.interview-report-embed .muted { color: #6b7280 !important; }
.interview-report-embed .form-control, .interview-report-embed .form-select { background: #fff !important; color: #181a3b !important; border-color: #e5e7eb !important; }
.interview-report-embed .table { --bs-table-color: #181a3b; color: #181a3b; }
.interview-report-embed .table thead th { background: #f3f4f6; color: #181a3b; }
.interview-report-embed .btnx { border: 1px solid #e5e7eb; background: #f9fafb; color: #181a3b; }
.interview-report-embed .btnx.primary { background: linear-gradient(135deg,#f29220,#e8890b); color: #fff; border: 0; }
.interview-report-embed .badge-soft { background: #f3f4f6; border-color: #e5e7eb; color: #181a3b; }
.interview-report-embed .table-wrap { height: auto; max-height: 420px; overflow: auto; }
@media print {
  .interview-report-embed .no-print, .interview-report-embed .actions, .interview-report-embed button, .interview-report-embed .btnx { display: none !important; }
}
</style>
<div class="rows col-12 interview-report-embed">
"""

body = "".join(lines[203:])
for suf in ("</body>\n</html>\n", "</body>\n</html>", "</body></html>\n", "</body></html>"):
    if body.endswith(suf):
        body = body[: -len(suf)]
        break

text = lines[0] + style + body + "</div>\n"
with open(path, "w", encoding="utf-8") as f:
    f.write(text)
print("OK, bytes:", len(text))
