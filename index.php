<?php
    include './inc/db.php';
    include './inc/form.php';

    $sql = 'SELECT * FROM users ORDER BY RAND() LIMIT 1';
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    include './inc/db_close.php';
?>

    <?php include_once './parts/header.php'; ?>

    <?php include_once './parts/banner.php'; ?>

    <div class="position-relative text-right m-5">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <h3 class="mb-3">أدخل معلوماتك للدخول في السحب</h3>
            <div class="mb-3">
                <label for="firstName" class="form-label">الأسم الأول</label>
                <input type="text" value="<?php if(isset($_POST['firstName'])) echo $firstName; ?>" name="firstName" class="form-control" id="firstName">
                <div class="form-text error"><?php echo $errors['firstNameError']?></div>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">الأسم الأخير</label>
                <input type="text" value="<?php if(isset($_POST['lastName'])) echo $lastName; ?>" name="lastName" class="form-control" id="lastName">
                <div class="form-text error"><?php echo $errors['lastNameError']?></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">الأيميل</label>
                <input type="text" value="<?php if(isset($_POST['email'])) echo $email; ?>" name="email" class="form-control" id="email">
                <div class="form-text error"><?php echo $errors['emailError']?></div>
            </div>
            <button type="submit" name="submit" class="btn btn-warning text-white fw-bold">تسجيل</button>
        </form>
        </div>
    </div>

    <div class="loader-container">
        <div id="loader">
            <canvas id="circularLoader" width="200" height="200"></canvas>
        </div>
    </div>

    <canvas id="confetti"></canvas>
    
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">الرابح في المسابقة</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <?php foreach($users as $user): ?>
                        <h1 class="text-center modal-title" id="modalLabel"><?php echo htmlspecialchars($user['firstName']) . ' ' . htmlspecialchars($user['lastName']); ?></h1>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

<?php include_once './parts/footer.php'; ?>