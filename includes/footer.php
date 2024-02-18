</body>

    <script src="assets/js/query.min.js"></script>
    <script src="assets/js/bootstrap5.min.js"></script>
    <script src="assets/js/scripts.js"></script>


  
<footer>
        <div class="contenido-main">
            <div class="caja izquierda">
                <h2>Acerca de Nosostros</h2>
                <div class="contenido">
                    <p>Espacio dedicado a uno de los personajes simbólicos nacidos en esta ciudad, se cuenta con una recopilación gráfica de distintas facetas de la vida de El Santo. Cuenta con un acervo de más de 200 piezas, donde abundan fotografías, carteles, recortes de periódico y artículos personales, así como las máscaras plateadas que lo identificaron y lo convirtieron en ícono.</p>
                    <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="button"><span class="fab fa-facebook-f"></span></button>
                            <button class="btn btn-danger" type="button"><span class="fa-brands fa-youtube"></span></button>
                            <button class="btn btn-danger" style="background-color:#DD2A7B;" type="button"><span class="fa-brands fa-instagram"></span></button>
                    </div>
                </div>
            </div>

            <div class="caja central">
                <h2>Contactanos</h2>
                <div class="contenido">
                    <div class="lugar">
                        <p><i class="fas fa-map-marker-alt"></i><span class="texto">Rodolfo Guzmán Huerta Santo El Enmascarado de Plata, Ferrocarrilera 2da Secc, 43640 Tulancingo de Bravo, Hgo.</span></p>
                    </div>
                    <div class="telefono">
                        <p><i class="fas fa-phone"></i> <span class="texto">(775) 755 84 50 ext. 1127</span></p>
                    </div>
                    <div class="email">
                        <p><i class="fas fa-envelope"></i><span class="texto">www.museodelsanto.gob.mx</span></p>
                    </div>
                </div>
            </div>

            <div class="caja derecha">
            <h2>¿Recibir nuestros avisos?</h2>
            <div class="contenido">
                <form action="procesar.php" method="POST">
                    <div class="email">
                        <div class="texto">Email</div>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <!-- <div class="msg">
                        <div class="texto">Mensaje</div>
                        <textarea cols="25" rows="2" required></textarea>
                    </div> -->

                    <button type="submit" name="enviar" class="btn btn-primary">Enviar Correo</button>

                </form>
            </div>
        </div>
    </div>

    <div class="boton">
        <center>
            <span class="far fa-copyright"></span><span>
      <a href="AVISO DE PRIVACIDAD.pdf">Aviso de Privacidad</a><br><br></span>
        </center>
    </div>
</footer>
</html>