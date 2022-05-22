<?php include("sql/contact-controller.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel="stylesheet" href="css/tailwind.css">
</head>

<body>
    <div class="py-14 px-24">

        <div class="flex justify-between pb-20 items-center">
            <h1 class="font-medium text-4xl">Contacts</h1>
            <button class="bg-blue-600 text-white px-5 py-3 text-md rounded-lg flex flex-row" id="createBtn">
                <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h2>Add Contact</h2>
            </button>
        </div>

        <div>
            <?php if (sizeof($contacts) == 0): ?>
                <div class="flex flex-col m-auto border-2 border-gray-200 w-fit py-3 px-5 my-3 rounded-lg justify-center items-center">
                    <h1 class="font-semibold text-lg"> No Contacts</h1>
                    <h3 class="text-sm">Click on the 'Add Contact' Button</h3>
                </div>

            <?php else: ?>
            <?php foreach($contacts as $contact): ?>
                <div class="w-7/12">
                    <a href="index.php?id=<?php echo $contact['id']; ?>">
                        <div class="flex flex-row border-gray-200 border-2 items-center py-3 px-5 my-3 rounded-lg justify-between text-gray-600" id="viewModal">
                            <img src="images/<?php echo $contact['image']; ?>" alt="" class="w-14 h-14 object-cover rounded-full">
                            <p class="flex-grow pl-8 items-start"><?php echo $contact['name']; ?></p>
                            <p><?php echo DateTime::createFromFormat('Y-m-d', $contact['date'])->format('F jS, Y'); ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; endif; ?>
        </div>


        <div id="createModal" class="hidden fixed z-[1] pt-28 left-0 top-0 w-full h-full overflow-auto bg-white bg-slate-600/50 ">
            <div class="bg-white m-auto p-12 border-2 border-gray-400 w-6/12 rounded-lg text-slate-600 font-medium">
                <div class="flex flex-col">
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <div class="flex flex-row justify-between items-center text-center pb-5">
                            <h1 class="text-2xl font-semibold text-center">Create a New Contact</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        </div>
                        <?php if (count($errors) != 0): ?>
                        <div class="border-2 border-gray-200 rounded-lg p-3 mb-3">
                            <?php foreach($errors as $error): ?>
                                    <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <div class="flex flex-col pb-7 gap-1">
                            <label for="name">Contact Name</label>
                            <input type="text" name="name" class="border-gray-200 border-2 rounded h-8 w-3/5" value="<?php echo $name; ?>">
                        </div>
                        <div class="flex flex-col pb-7 gap-1">
                            <label for="image">Image</label>
                            <div>
                                <input type="file" id="file2" class="hidden" name='image'>
                                <label for="file2" class="text-black font-normal relative flex items-center justify-center cursor-pointer border-gray-200 border-2 rounded h-8 w-4/12">
                                    Add File
                                    <p class="file-name" id="file-name-2"></p>
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-col pb-7 gap-1">
                            <label for="date">Last Contact Date</label>
                            <input type="date" name="date" class="border-gray-200 border-2 rounded h-8 w-3/5" value="<?php echo $date; ?>">
                        </div>
                        <button type="submit" name="add-contact" class="bg-blue-500 w-fit text-sm text-white py-2 px-5 rounded-lg">Save Contact</button>
                    </form>
                </div>
            </div>
        </div>


        <div id="viewContact" class="<?php if(!isset($_GET['id'])) {echo "hidden";}; ?> fixed z-[1] pt-28 left-0 top-0 w-full h-full overflow-auto bg-white bg-slate-600/50 ">
            <div class="bg-white m-auto p-12 border-2 border-gray-400 w-6/12 rounded-lg text-slate-600 font-medium">
                <div class="flex flex-col">
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="id" value="<?php echo $id; ?>" hidden> 

                        <div class="flex flex-row justify-between items-center pb-5 text-center">
                            <h1 class="text-2xl font-semibold">View a Contact</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        </div>
                        <div class="flex flex-col pb-7 gap-1">
                            <h3>Contact Name</h3>
                            <input type="text" name="name" class="border-gray-200 border-2 rounded h-8 w-3/5" value="<?php echo $name; ?>">
                        </div>
                        <div class="flex flex-col pb-7 gap-1">
                            <h3>Image</h3>
                            <div class="flex items-center gap-3">
                                <img src="images/<?php echo $image; ?>" alt="" class="w-14 h-14 object-cover rounded-full">
                                <div>
                                    <input type="file" id="file" class="hidden" name='image'>
                                    <label for="file" class="text-black font-normal relative flex items-center justify-center cursor-pointer border-gray-200 border-2 rounded h-8 px-16">
                                        Add File
                                        <p class="file-name" id="file-name"></p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col pb-7 gap-1">
                            <h3>Last Contact Date</h3>
                            <input type="date" name="date" class="border-gray-200 border-2 rounded h-8 w-3/5" value="<?php echo $date; ?>">
                        </div>
                        <button type="submit" name="update-contact" class="bg-blue-500 w-fit text-sm text-white py-2 px-5 rounded-lg">Update Contact</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/script.js"></script>
</body>


</html>