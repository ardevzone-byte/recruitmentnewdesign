from pathlib import Path

p = Path("application/views/candidates/regions_report.php")
lines = p.read_text(encoding="utf-8").splitlines()
inner = "\n".join(lines[183:554])
header = """<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
.regions-report-embed { background: #f8fafc; padding: 0 0 2rem; }
.regions-report-embed .wrap { max-width: 1200px; margin: 0 auto; padding: 0 1rem; }
</style>
<div class="regions-report-embed">
"""
footer = "\n</div>\n"
p.write_text(header + inner + footer, encoding="utf-8")
print("ok")
