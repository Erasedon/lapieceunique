
          
<div class="container">
    <div class="inscription">
        <h3>Scanner :</h3>

        <div class="error"></div>

        <form method="post" action="assets/includes/traitement/traitementscanner.php" id="formajax">
            <div class="model_un">
				<div class="nom">
                    <!-- <label for="">Code barre :</label> -->
                    <label>Result:</label>
                    <input type="text" id="result" name="cb">
                </div>
			</div>
            <div>
                <a class="button" id="startButton">Start</a>
                <a class="button" id="resetButton">Reset</a>
            </div>

            <div>
                <video id="video" width="600" height="400" style="border: 1px solid gray"></video>
            </div>

            <div id="sourceSelectPanel" style="display:none">
                <label for="sourceSelect">Change video source:</label>
                <select id="sourceSelect" style="max-width:400px">
                </select>
            </div>

            
            <div class="model_deux">
                <label for=""></label>
            
            </div>
            <input type="submit" class="sub" value="Valider">
        </form>
    </div>
</div>


