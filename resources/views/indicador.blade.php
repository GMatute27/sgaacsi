<!DOCTYPE html>
<html lang="en">
    @vite(['resources/css/indexevi.css'])
<x-header></x-header>

<body>


    <div class="container">
        <div class="header">
            <h2>1.1.- Diseño y Planificación de la Enseñanza</h2>
        </div>

        <div class="indicator">
            <h3>Indicador 1.1.1:</h3>
            <p>El proyecto curricular explicita los aprendizajes y/o desempeños que los estudiantes deben lograr en cada
                grado escolar y área del currículum que aseguran la formación integral.</p>
        </div>

        <div class="options">
            <label class="option">
                <input type="radio" name="nivel" class="radio-input">
                <span>El proyecto curricular del centro no está explicitado, o si existe no explicita los aprendizajes
                    en ninguna área o grado escolar.</span>
            </label>

            <label class="option">
                <input type="radio" name="nivel" class="radio-input">
                <span>El proyecto curricular explicita los aprendizajes solamente en las áreas académicas (asignaturas)
                    en todos o algunos grados escolares.</span>
            </label>

            <label class="option">
                <input type="radio" name="nivel" class="radio-input">
                <span>El proyecto curricular explicita parcialmente los aprendizajes que se espera lograr en los
                    estudiantes, ya sea porque refiere a algunos grados escolares, o bien porque refiere sólo a algunas
                    áreas que dan cuenta de la formación integral.</span>
            </label>

            <label class="option">
                <input type="radio" name="nivel" class="radio-input">
                <span>El proyecto curricular explicita los aprendizajes y/o desempeños que los estudiantes deben lograr
                    en cada grado escolar y en cada una de las áreas del currículum que aseguran la formación
                    integral.</span>
            </label>
        </div>

        <div class="evidence-section">
            <h3>Evidencias</h3>
            <div class="file-upload">
                <input type="file" id="file-input" class="file-input">
                <label for="file-input" class="file-label">
                    <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z">
                        </path>
                    </svg>
                    <span class="file-text">Seleccionar archivo</span>
                </label>
                <p class="file-name">Ningún archivo seleccionado</p>
            </div>
        </div>

        <div class="evidence-section">
            <h3>Fundamentación de las evidencias</h3>
            <textarea class="documentation"
                placeholder="Escriba aquí la fundamentación de sus evidencias..."></textarea>
        </div>

        <div class="form-group observations-section">
            <h3>Observaciones</h3>
            <textarea maxlength="300" placeholder="Escribe tus observaciones aquí..."></textarea>
            <div class="char-count">300 caracteres restantes</div>
        </div>

        <div class="comments-container">
            <div class="comments-header">
                <h2>Comentarios del facilitador en indicadores</h2>
            </div>
            <div class="comments-content">
                <div class="no-comments">
                    Aún no hay comentarios
                </div>
            </div>
        </div>

        <div class="button-group">
            <button class="btn btn-secondary">Guardar</button>
            <button class="btn btn-primary">Guardar y pasar a la siguiente pregunta</button>
        </div>
        </section>

    </div>
    <footer>
        <p>FLACI ACSI copyright 2024</p>
    </footer>
    <script src="script.js"></script>

</body>

</html>