<?php ?>


   <div class="middle">

            <div class="form container">
                <h2>Get in Touch !</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="firstName"></label>
                        <input type="text" id="firstName" name="firstName" placeholder="non , prenom , pseudo"
                               value=<?= $firstName ?>>
                        <?php
                        $classe = "form-text text-error";
                        if (isset($errors['firstName'])) {
                            $helpName = $errors['firstName'];
                        } else {
                            $helpName = "Champ obligatoire , 45 carateres max.";
                            $classe = "form-text";
                        } ?>
                        <small id="firstNameHelp" class="<?= $classe ?>">
                            <?php echo $helpName; ?>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="email" id="email" name="email" placeholder="Mail" value=<?= $email ?>>
                        <?php if (isset($errors['email'])) {
                            $helpEmail = $errors['email'];
                        } else {
                            $classe = "form-text";
                            $helpEmail = "Champ obligatoire , l'emai l doit etre valide.";
                        } ?>
                        <small id="emailHelp" class="<?= $classe ?>">
                            <?php echo $helpEmail; ?>
                        </small>

                    </div>
                    <div class="form-group">
                        <label for="msg"></label>
                        <textarea id="msg" name="message" placeholder="Message"><?= $message ?></textarea>
                        <?php if (isset($errors['message'])) {
                            $helpMessage = $errors['message'];
                        } else {
                            $classe = "form-text";
                            $helpMessage = "Champ  obligatoire.";
                        } ?>
                        <small id="messageHelp" class="<?= $classe ?>">
                            <?php echo $helpMessage; ?>
                        </small>

                    </div>
                    <button type="submit" class="button" name="submit">Envoyer</button>
                </form>
            </div>

        </div>
