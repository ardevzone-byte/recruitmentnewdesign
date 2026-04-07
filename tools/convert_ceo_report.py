from pathlib import Path

p = Path("application/views/reports/ceo_team_report.php")
t = p.read_text(encoding="utf-8")
i0 = t.find("<style>")
i1 = t.find("</style>")
style_inner = t[i0 + 7 : i1]
b0 = t.find("<body>")
b1 = t.find("</body>")
body_inner = t[b0 + 6 : b1].strip()
style_inner = style_inner.replace("body {", ".ceo-team-report-embed {", 1)
style_inner = style_inner.replace(
    "body { background: white; }", ".ceo-team-report-embed { background: white; }"
)
header = """<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>"""
footer = """</style>
<div class="rows col-12 jobs-dashboard ceo-team-report-embed" dir="ltr">
"""
close = "\n</div>\n"
out = header + style_inner + footer + body_inner + close
p.write_text(out, encoding="utf-8")
print("ok", len(out))
