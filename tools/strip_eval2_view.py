from pathlib import Path

p = Path("application/views/candidates/candidate_evaluations2.php")
lines = p.read_text(encoding="utf-8").splitlines()
inner = "\n".join(lines[39:345])
header = """<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
.candidate-evaluations2-embed { background: #f8fafc; padding: 1rem 0 2rem; }
.candidate-evaluations2-embed .wrap { max-width: 1200px; margin: 0 auto; padding: 0 1rem; }
.candidate-evaluations2-embed .card { background: #fff; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,.08); border: 1px solid #e2e8f0; }
.candidate-evaluations2-embed .btn { border-radius: 8px; }
</style>
<div class="candidate-evaluations2-embed">
"""
footer = "\n</div>\n"
p.write_text(header + inner + footer, encoding="utf-8")
print("ok")
