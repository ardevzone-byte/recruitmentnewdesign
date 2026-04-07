<!doctype html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>مرسوم - لوحة التحكم</title>
    <link rel="icon" href="<?php echo base_url('newassets/images/fav.png'); ?>" />

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('newassets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url('newassets/css/owl.carousel.min.css'); ?>" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('newassets/css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('newassets/css/marsoom-style.css'); ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <!-- phone CSS -->
    <link rel="stylesheet" href="<?php echo base_url('newassets/css/phone.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('newassets/css/responsive.css'); ?>" />
</head>
<body>
    <div class="loading">
        <div class="logo-center"><img src="<?php echo base_url('newassets/images/loading.svg'); ?>" alt="" /></div>
    </div>

    <section class="login">
        <section class="bg-login">
            <!-- PARTICLES -->
            <canvas id="particles"></canvas>
            <!-- HEXAGON GRID -->
            <div id="hexagonGrid"></div>
        </section>

        <div class="container">
            <div class="block col-12 col-md-6">
                <img src="<?php echo base_url('newassets/images/logo.svg'); ?>" alt="" />
                <h1>تسجيل الدخول</h1>
                <?php if($this->session->flashdata('login_failed')): ?>
                    <div class="alert alert-danger mb-3"><?= $this->session->flashdata('login_failed') ?></div>
                <?php endif; ?>
                <?php echo form_open('users/login'); ?>
                    <label for="username">رقم الهوية <i>*</i></label>
                    <input type="text" name="username" class="text id" id="username" placeholder="ادخل رقم الهوية" />

                    <label for="password">كلمة المرور <i>*</i></label>
                    <i class="hide"></i>
                    <input type="password" name="password" class="text password" id="password" placeholder="ادخل كلمة المرور" />

                    <button type="submit" name="submitForm" value="formSave" class="button hex-btn" style="width:100%;">تسجيل الدخول</button>
                    <a class="forget" href="<?php echo base_url('users/forgot_password'); ?>">نسيت كلمة المرور؟</a>
                    <div class="foot col-12">
                        <span>ليس لديك حساب؟</span>
                        <a class="reg" href="<?php echo base_url('users/register'); ?>">إنشاء حساب جديد</a>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <div class="block col-12 col-md-6">
                <div class="login-slider owl-carousel">
                    <div class="item">
                        <img src="<?php echo base_url('newassets/images/login/s1.png'); ?>" alt="" />
                        <div class="des">
                            <img src="<?php echo base_url('newassets/images/login/des.png'); ?>" alt="" />
                            <div class="cover">
                                <h3>نظام مرسوم لتحصيل الديون</h3>
                                <p>تأسست شركة مرسوم لتحصيل الديون (مساهمة مغلقة)</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url('newassets/images/login/s2.png'); ?>" alt="" />
                        <div class="des">
                            <img src="<?php echo base_url('newassets/images/login/des.png'); ?>" alt="" />
                            <div class="cover">
                                <h3>تحصيل الديون المعدومة لعملائنا</h3>
                                <p>تأسست شركة مرسوم لتحصيل الديون (مساهمة مغلقة)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        body {
            position: relative;
            width: 100%;
            min-height: 100vh;
            direction: inherit;
        }

        section.bg-login {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: #000000;
        }

        #particles {
            background: #000000;
        }

        #hexagonGrid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        #hexagonGrid .row-block {
            display: inline-flex;
            margin-top: -32px;
            margin-left: -50px;
        }
        #hexagonGrid .row-block:nth-child(even) {
            margin-left: 2px;
        }
        #hexagonGrid .row-block .hexagon {
            position: relative;
            width: 100px;
            height: 110px;
            margin: 4px 2px;
            clip-path: polygon(
                50% 0%,
                100% 25%,
                100% 75%,
                50% 100%,
                0% 75%,
                0% 25%
            );
        }
        #hexagonGrid .row-block .hexagon::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #171938;
            opacity: 0.95;
            transition: 1s;
        }
        #hexagonGrid .row-block .hexagon::after {
            content: "";
            position: absolute;
            top: 4px;
            right: 4px;
            bottom: 4px;
            left: 4px;
            background: #0a0c25;
            clip-path: polygon(
                50% 0%,
                100% 25%,
                100% 75%,
                50% 100%,
                0% 75%,
                0% 25%
            );
        }
        #hexagonGrid .row-block .hexagon:hover::before {
            background: #f29840;
            opacity: 1;
            transition: 0s;
        }
        #hexagonGrid .row-block .hexagon:hover::after {
            background: #000000;
        }
    </style>

    <script>
        // PARTICLES (unchanged)
        const cvs = document.getElementById("particles");
        const ctx = cvs.getContext("2d");

        cvs.width = window.innerWidth;
        cvs.height = window.innerHeight;

        let particlesArray;

        let mouse = {
            x: null,
            y: null,
            radius: 170,
        };

        window.addEventListener("mousemove", function (event) {
            mouse.x = event.x;
            mouse.y = event.y;
            mouse.radius = 170;
        });

        document.onmousemove = (function (event) {
            var onmousestop = function () {
                    mouse.radius = 0;
                },
                thread;

            return function () {
                clearTimeout(thread);
                thread = setTimeout(onmousestop, 10);
            };
        })();

        class Particle {
            constructor(x, y, directionX, directionY, size, color) {
                this.x = x;
                this.y = y;
                this.directionX = directionX;
                this.directionY = directionY;
                this.size = size;
                this.color = color;
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2, false);
                ctx.fillStyle = "#F29840";
                ctx.fill();
            }

            update() {
                if (this.x > cvs.width || this.x < 0) {
                    this.directionX = -this.directionX;
                }

                if (this.y > cvs.height || this.y < 0) {
                    this.directionY = -this.directionY;
                }

                let dx = mouse.x - this.x;
                let dy = mouse.y - this.y;
                let distance = Math.sqrt(dx * dx + dy * dy);
                if (distance < mouse.radius + this.size) {
                    if (mouse.x < this.x && this.x < cvs.width - this.size * 10) {
                        this.x += 10;
                    }

                    if (mouse.x > this.x && this.x > this.size * 10) {
                        this.x -= 10;
                    }

                    if (mouse.y < this.y && this.y < cvs.height - this.size * 10) {
                        this.y += 10;
                    }

                    if (mouse.y > this.y && this.y > this.size * 10) {
                        this.y -= 10;
                    }
                }
                this.x += this.directionX;
                this.y += this.directionY;

                this.draw();
            }
        }

        function init() {
            particlesArray = [];
            let numberOfParticles = (cvs.height * cvs.width) / 9000;
            for (let i = 0; i < numberOfParticles * 0.25; i++) {
                let size = Math.random() * 35 + 1;
                let x = Math.random() * (innerWidth - size * 2 - size * 2) + size * 2;
                let y = Math.random() * (innerWidth - size * 2 - size * 2) + size * 2;
                let directionX = Math.random() * 5 - 2.5;
                let directionY = Math.random() * 5 - 2.5;
                let color = "#72C100";
                particlesArray.push(
                    new Particle(x, y, directionX, directionY, size, color),
                );
            }
        }

        function connect() {
            let opacityValue = 1;
            for (let i = 0; i < particlesArray.length; i++) {
                for (let j = i; j < particlesArray.length; j++) {
                    let distance =
                        (particlesArray[i].x - particlesArray[j].x) *
                            (particlesArray[i].x - particlesArray[j].x) +
                        (particlesArray[i].y - particlesArray[j].y) *
                            (particlesArray[i].y - particlesArray[j].y);

                    if (distance < (cvs.width / 7) * (cvs.height / 7)) {
                        opacityValue = 1 - distance / 20000;
                        ctx.strokeStyle = "rgba(159, 253, 50," + opacityValue + ")";
                        ctx.lineWidth = 1;
                        ctx.beginPath();
                        ctx.moveTo(particlesArray[i].x, particlesArray[i].y);
                        ctx.lineTo(particlesArray[j].x, particlesArray[j].y);
                        ctx.stroke();
                    }
                }
            }
        }

        function animate() {
            requestAnimationFrame(animate);
            ctx.clearRect(0, 0, innerWidth, innerHeight);
            for (let i = 0; i < particlesArray.length; i++) {
                particlesArray[i].update();
            }
            connect();
        }

        window.addEventListener("resize", function () {
            cvs.width = innerWidth;
            cvs.height = this.innerHeight;
            mouse.radius = 170;
            init();
        });

        window.addEventListener("mouseout", function () {
            mouse.x = undefined;
            mouse.y = undefined;
        });

        init();
        animate();

        // HEXAGON GRID
        function hexagonGrid() {
            const HEXAGON_GRID = document.getElementById("hexagonGrid");
            const CONTAINER = HEXAGON_GRID.parentNode;

            let wall = {
                width: CONTAINER.offsetWidth,
                height: CONTAINER.offsetHeight,
            };

            let rowsNumber = Math.ceil(wall.height / 80);
            let columnsNumber = Math.ceil(wall.width / 100) + 1;

            HEXAGON_GRID.innerHTML = "";

            for (let i = 0; i < rowsNumber; i++) {
                let row = document.createElement("div");
                row.className = "row-block";
                HEXAGON_GRID.appendChild(row);
            }

            let rows = HEXAGON_GRID.querySelectorAll(".row-block");

            for (let i = 0; i < rows.length; i++) {
                for (let j = 0; j < columnsNumber; j++) {
                    let hexagon = document.createElement("div");
                    hexagon.className = "hexagon";
                    rows[i].appendChild(hexagon);
                }
            }
        }

        hexagonGrid();

        window.addEventListener("resize", function () {
            hexagonGrid();
        });

        // FPS METER
        (function () {
            let previousTime = Date.now();
            let frames = 0;
            let refreshRate = 1000;

            let fpsMeter = document.createElement("div");
            //   fpsMeter.id = "fpsMeter";
            document.body.appendChild(fpsMeter);

            requestAnimationFrame(function loop() {
                const TIME = Date.now();
                frames++;
                if (TIME > previousTime + refreshRate) {
                    let fps = Math.round(
                        (frames * refreshRate) / (TIME - previousTime),
                    );
                    previousTime = TIME;
                    frames = 0;
                    fpsMeter.innerHTML = "FPS: " + fps * (1000 / refreshRate);
                }
                requestAnimationFrame(loop);
            });

            fpsMeter.style.position = "fixed";
            fpsMeter.style.top = "25px";
            fpsMeter.style.right = "25px";
            fpsMeter.style.background = "rgba(0, 0, 0, 0.5)";
            fpsMeter.style.padding = "10px";
            fpsMeter.style.color = "rgba(255, 255, 255, 0.75)";
            fpsMeter.style.fontFamily = "Monospace";
            fpsMeter.style.fontSize = "24px";
            fpsMeter.style.zIndex = "-99999";
        })();
    </script>

    <!-- Libraries (CDN) -->
    <script src="<?php echo base_url('newassets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('newassets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('newassets/js/owl.carousel.min.js'); ?>"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url('newassets/js/main.js'); ?>"></script>
</body>
</html>