<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="design, frontend, code, developer, fullstack, portfolio, page, works, behance, github, linkedin" />
	<meta name="description" content="Portfolio of designer and frontend developer Daniil Novikov" />
	<title>Daniil Novikov · About</title>

	<link rel="stylesheet" href="../css/reset.css" />
	<link rel="stylesheet" href="../css/components/header.css" />
	<link rel="stylesheet" href="../css/components/footer.css" />
	<link rel="stylesheet" href="../css/fonts.css" />
	<link rel="stylesheet" href="../css/animate.css" />

	<link rel="stylesheet" href="../css/pages/work.css" />
	<link rel="stylesheet" href="../css/pages/index.css" />
	<link rel="stylesheet" href="../css/pages/projects.css" />

</head>
<body>
	<header class="header">
		<a class="logo slide-bottom" href="/">
			Daniil Novikov
		</a>

		<nav class="mainmenu slide-bottom">
			<ul class="menu-list">
				<li class="menu-item active"><a href="/">About</a></li>
				<li class="menu-item"><a href="/work">Work</a></li>
				<li class="menu-item"><a href="../resume-eng.pdf" target="_blank">Resume</a></li>
			</ul>
		</nav>
	</header>
	<main class="content">
		<?php include 'application/views/'.$content_view; ?>
	</main>

	<footer class="footer">
		<img src="images/icons/heart.svg" alt="Thanks wor watching icon" />
		<h6>Let's work together :)</h6>
		<form action="/success" class="contact-form">
			<label class="label">
				Заказ сайта
				<input type="text" name="callback" placeholder="example@gmail.com" required>
			</label>
			<label class="label radio">
				Дизайн
				<input type="radio" name="serviceChoise" value="дизайн" checked>
			</label>
			<label class="label radio">
				Разработка сайта
				<input type="radio" name="serviceChoise" value="разработка сайта">
			</label>

			<button class="submit-button">Отправить</button>
		</form>
		<a href="mailto:dannovik30@gmail.com" class="footer-email-contact">dannovik30@gmail.com</a>

		<div class="footer-icons-row">
			<a href="https://www.facebook.com/profile.php?id=100004432082899" target="_blank">
				<img src="images/icons/facebook-logo.svg" alt="Facebook profile link" />
			</a>
			<a href="https://www.instagram.com/novicode/" target="_blank">
				<img src="images/icons/instagram-logo.svg" alt="Instagram profile link" />
			</a>
			<a href="https://github.com/NovicodeGithub" target="_blank">
				<img src="images/icons/github-logo.svg" alt="Github profile link" />
			</a>
			<a href="https://www.behance.net/novicode" target="_blank">
				<img src="images/icons/behance-logo.svg" alt="Behance profile link" />
			</a>
			<a href="https://www.linkedin.com/in/novicode" target="_blank">
				<img src="images/icons/linkedin-logo.svg" alt="Linked In profile link" />
			</a>
		</div>
		<div class="footer-legal-copyright">
			Novicode <span class="new-line-text">2019</span>
		</div>
	</footer>
</body>
</html>
