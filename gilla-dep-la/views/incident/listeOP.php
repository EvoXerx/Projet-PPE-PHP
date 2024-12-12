<div class="container p-1">
    <h2>Liste des Incidents Ouverts ou Prises en Charges</h2>
    <div class="card">
        <div class="card-body p-1">
            <!-- Action -->
            

            <!-- Liste -->
            
            <ul class="list-group pt-3">

            

            <div class="d-flex">
                        <table class="table table-bordered border-warning table-warning table-hover ">
                            <thead class="table table-light">
                                <tr>
                                    <th>Etat</th>
                                    <th>Incident</th>
                                    <th>Famille</th>
                                    <th>Type</th>
                                    <th>Bâtiment</th>
                                    <th>Salle</th>
                                    <th>Poste</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            
                            foreach ($incidents as $incident) {
                                ?>
                                <tr>
                                    <td><?= $incident->descE?></td>
                                    <td><?= $incident->descI?></td>
                                    <td><?= $incident->famille?></td>
                                    <td><?= $incident->typeM?></td>
                                    <td><?= $incident->batiment?></td>
                                    <td><?= $incident->salle?></td>
                                    <td><?= $incident->poste?></td>
                                
                                </tr>  
                                <?php
                            }
                                ?>
                        </tbody>
                    </table>
                </div>       
            </ul>
            

            
        </div>
    </div>
    <div class="d-grid gap-2 col-4 mx-auto">

        <button type="button" class="btn btn-warning" ><i class="bi bi-card-checklist"></i> <a href="/incident/form">Signaler un Incident</a></button>
    </div>
</div>