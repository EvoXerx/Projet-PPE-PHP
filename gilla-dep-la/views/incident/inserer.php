
<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body text-center">
                <main class="form-signin">
                    <form method="POST" action="/incident/inserer">
                        <h2>Formulaire de signalement des incidents :</h2>
                        <div class="mb-3 mt-3">
                            <style>
                            textarea {
                            width: 2000px;
                            max-width: 100%;
                            height: 50px;
                            padding: 8px;
                            box-sizing: border-box;
                            resize: vertical;
                            }

                            .container {
                            max-width: 600px;
                            margin: 50px auto;
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 0 10px rgba(0,0,0,0.5);
                            }

                            input, text {
                            width: 100%;
                            padding: 8px;
                            margin-bottom: 16px;
                            box-sizing: border-box;
                            }

                            label {
                                display: block;
                                margin-bottom: 8px;
                            }

                            button {
                                background-color: #28a745;  
                                color: #fff;
                                padding: 10px 15px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;
                            }

                            button:hover {
                                background-color: #218838;
                            }
                            
                            </style>
                            
                            <label for="description"><b>Description :</b></label>
                            <textarea type="description" id="description" name="commentaire" required></textarea>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="priorite"><b>Priorité :</b></label>
                            <input type="number" id="priorite" name="priorite" min="1" max="3" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="batiment"><b>Bâtiment :</b></label>
                            <input type="text" id="batiment" name="batiment" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="materiel"><b>Type de Matériels :</b></label>
                            <select class="form-select" name= "idmat">
                            <?php
                           
                
                            foreach ($materiels as $materiel) {
                                ?>
                                <option value= "<?= $materiel->id?>"><?= $materiel->famille?> - <?= $materiel->type?></option>
                                
                                
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <label for="info"><b>Note :</b> Après votre signalement, un agent viendra vous prendre en charge sous un delai de 2 jours maximum sous peine de complication, Merci de votre compréhension. </label>
                        <button type="submit" id='submit' onclick="return confirm('As-tu bien vérifier que le signalement est pas une erreur ?')">Signaler</button>
                        
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
