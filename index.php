<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Exercise 4</title>
</head>
<style>
    i {
        color: white;
    }
</style>

<body>
    <?php
    $data = [
        'fruits' => [
            'Apple' => 'ផ្លែប៉ោម',
            'Banana' => 'ផ្លែចេក',
            'Orange' => 'ក្រូច',
            'Grape' => 'ផ្លែទំពាំងបាយជូរ'
        ],
        'occupation' => [
            'Teacher' => 'គ្រូបង្រៀន',
            'Doctor' => 'វេជ្ជបណ្ឌិត',
            'Student' => 'សិស្ស',
            'Mobile app developer' => 'អ្នកអភិវឌ្ឍន៍កម្មវិធីទូរស័ព្ទ',
            'Web developer' => 'អ្នកអភិវឌ្ឍន៍កម្មវិធីវេប',
            'Data scientist' => 'អ្នកវិទ្យាសាស្ត្រទិន្នន័យ'
        ],
        'courses' => [
            'Math' => 'គណិតវិទ្យា',
            'English' => 'អង់គ្លេស',
            'Computer' => 'កំព្យូទ័រ',
            'Physics' => 'រូបវិទ្យា',
            'Biology' => 'ជីវវិទ្យា',
            'Chemistry' => 'គីមីវិទ្យា'
        ]
    ];
    ?>
    <div class="container-fluid mt-5">
        <h1 class="text-center mb-5">PHP AND BOOTSTRAP</h1>
        <form action="Exercise6.php" method="get">
            <div class="row">
                <div class="col-sm-6 col-8">
                    <select name="choice" id="data" class="form-control">
                        <option value="" disabled selected>Select your option</option>
                        <option value="fruits">Fruits</option>
                        <option value="occupation">Occupation</option>
                        <option value="courses">Courses</option>
                    </select>
                </div>
                <div class="col-sm-3 col-2">
                    <button type="submit" class="btn btn-success" name="btnSave">Save</button>
                </div>
                <div class="col-sm-3 col-2">
                    <a href="./exercise1.php" class="btn btn-primary">Next</a>
                </div>
            </div>

        </form>
        <br>
        <br>

        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>
                        English
                    </th>
                    <th>Khmer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['btnSave'])) {
                    if (isset($_GET['choice']) != null) {
                        $choice = $_GET['choice'];
                        foreach ($data[$choice] as $key => $value) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $key; ?>
                                    </td>
                                    <td>
                                        <?php echo $value; ?>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <div class="alert alert-danger" id="alert">
                                Choose an option to show data
                            </div>
                        <?php
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<script>
    new DataTable('#example');
    setInterval(() => {
        $("#alert").fadeOut(1000);
    }, 2000);
</script>
</html>