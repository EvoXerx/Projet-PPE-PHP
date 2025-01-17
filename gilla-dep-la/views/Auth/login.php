<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body text-center">
                <main class="form-signin">
                    <form method="POST" action="/auth/recupLogin">
                        <h1 class="h3 mb-3 fw-normal">Connexion</h1>

                        <div class="form-floating">
                            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <button class="w-100 mt-5 btn btn-lg btn-primary" type="submit">Connexion</button>
                        
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
