from pathlib import Path

p = Path("application/views/candidates/candidate_attachments.php")
lines = p.read_text(encoding="utf-8").splitlines()
# body starts line 253 (index 252) - user grep said <body> at 253
# </body> at 383 - so inner is 254:382 (indices 253-381)
inner = "\n".join(lines[253:382])
header = """<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
.candidate-attachments-embed { background: #f8fafc; padding: 1rem 0 2rem; }
.candidate-attachments-embed .wrap { max-width: 1200px; margin: 0 auto; padding: 0 1rem; }
.candidate-attachments-embed .card { background: #fff; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,.08); border: 1px solid #e2e8f0; }
</style>
<div class="candidate-attachments-embed">
"""
footer = "\n</div>\n"
p.write_text(header + inner + footer, encoding="utf-8")
print("ok")
