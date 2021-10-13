Feature: AccesoSistema.feature
  In order to acceder a las opciones del sistema
  As a usuario
  I need to accesar al sistema

  Scenario: Acceder al sistema con datos vacios
  Given estoy en la pagina de acceso
  And capturo "" en el login
  And capturo "" en el password
  When Hago click en aceptar
  Then Recibo el mensaje de error "Login cannot be blank."

  Scenario: Acceder al sistema con datos incorrectos
  Given estoy en la pagina de acceso
  And capturo "usuario" en el login
  And capturo "prueba" en el password
  When Hago click en aceptar
  Then Recibo el mensaje de error "Invalid login or password"

  Scenario: Acceder al sistema con datos correctos
  Given estoy en la pagina de acceso
  And capturo "user@example.com" en el login
  And capturo "qwerty" en el password
  When Hago click en aceptar
  Then Veo en la barra de navegación el nombre del usuario "user"
