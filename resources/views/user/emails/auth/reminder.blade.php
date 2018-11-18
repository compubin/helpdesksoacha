<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Reestablecer contraseña</h2>

		<div>
			Para reestablecer la contraseña, por favor complete este formulario: {{ URL::to('user/reset', array($token)) }}.
		</div>
	</body>
</html>