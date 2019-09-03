<?php

require '../bootloader.php';

use App\App;

$createForm = new \App\Feedbacks\Views\CreateForm();
$updateForm = new \App\Feedbacks\Views\UpdateForm();
$navigation = new \App\Views\Navigation();
$footer = new \App\Views\Footer();

$model = new \App\Feedbacks\Model();
$feedbacks = $model->get();
$feedback_array = [];

if ($feedbacks) {
    foreach ($feedbacks as $key => $feedbackas) {
        $feedback_array[] = $feedbackas->getData();
        unset($feedback_array[$key]['id']);
    }
}

//if (!App::$session->userLoggedIn()) {
//    header('Location: /index.php');
//}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Feedback.php</title>
        <link rel="stylesheet" href="media/css/normalize.css">
        <link rel="stylesheet" href="media/css/milligram.min.css">
        <link rel="stylesheet" href="media/css/style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <header>
            <?php print $navigation->render(); ?>
        </header>

        <main>
            <section class="wrapper">
                <div class="block">
                    <div id="person-table">
                        <h2>Feedbacks:</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Feedback</th>
                                    <th>Date</th>
                                    <?php if (App::$session->userLoggedIn()): ?>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Rows Are Dynamically Populated -->
                                <?php if (!App::$session->userLoggedIn()): ?>
                                    <?php foreach ($feedback_array as $feedbackas): ?>
                                        <tr>
                                            <td><?php print $feedbackas['name']; ?></td>
                                            <td><?php print $feedbackas['feedback']; ?></td>
                                            <td><?php print $feedbackas['date']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>                    
                </div>
                <?php if (App::$session->userLoggedIn()): ?>
                    <div class="block">
                        <h2>Write a feedback about us:</h2>                    
                        <?php print $createForm->render(); ?>
                    </div>
                <?php else: ?>
                    <div class="block">
                        <p>If you want to leave a comment please register <a href="/register.php">here</a>!</p>
                    </div>
                <?php endif; ?>
            </section>

            <!-- Update Modal -->
            <div id="update-modal" class="modal">
                <div class="wrapper">
                    <span class="close">&times;</span>
                    <?php print $updateForm->render(); ?>
                </div>
            </div>            
        </main>

        <!-- Footer -->        
        <footer>
            <?php print $footer->render(); ?>
        </footer>

        <script defer src="media/js/app.js"></script>
    </body>
</html>