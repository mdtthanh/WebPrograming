<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" />
    <title>Form Contact</title>
</head>

<body>
    <div class="background"></div>
    <div class="container">
        <div class="wrap">
            <h2>Form contact!</h2>
            <form action="prosess.php" enctype="multipart/form-data" method="POST">
                <table>
                    <tr>
                        <td>
                            <span>First Name</span>
                        </td>
                        <td>
                            <label>
                                <span class="form-input">
                                    <div class="style-icon">
                                        <i class="fa-solid fa-user group-icon"></i>
                                    </div>
                                    <input type="text" style="padding-left: 10px" name="first_name" placeholder="First Name" value="<?= @$_POST['first_name'] ?>">
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Last Name</span>
                        </td>
                        <td>
                            <label>
                                <span class="form-input">
                                    <div class="style-icon">
                                        <i class="fa-solid fa-user group-icon"></i>
                                    </div>
                                    <input type="text" style="padding-left: 10px" placeholder="Last Name" name="last_name" value="<?= @$_POST['last_name'] ?>">
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Sex</span>
                        </td>
                        <td style="text-align: left;">
                            <label>
                                <input style="width: 20px; margin: auto;" type="radio" name="gender" value="male" <?= @$_POST['gender'] == 'male' ? 'checked' : '' ?>>
                                Male
                            </label>
                            <label>
                                <input style="width: 20px;" type="radio" name="gender" value="female" <?= @$_POST['gender'] == 'female' ? 'checked' : '' ?>>
                                Female
                            </label>
                            <label>
                                <input style="width: 20px;" type="radio" name="gender" value="other" <?= @$_POST['gender'] == 'other' ? 'checked' : '' ?>>
                                Other
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Email</span>
                        </td>
                        <td>
                            <label>
                                <span class="form-input">
                                    <div class="style-icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <input type="email" name="email" style="padding-left: 10px" placeholder="Email" value="<?= @$_POST['email'] ?>">
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Work</span>
                        </td>
                        <td>
                            <label>
                                <span class="form-input">
                                    <div class="style-icon">
                                        <i class="fa-solid fa-briefcase"></i>
                                    </div>
                                    <input type="text" style="padding-left: 10px" placeholder="Work" name="work" value="<?= @$_POST['work'] ?>">
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Phone number</span>
                        </td>
                        <td>
                            <label>
                                <span class="form-input">
                                    <div class="style-icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <input type="phone" style="padding-left: 10px" placeholder="(+84)" name="phone" value="<?= @$_POST['phone'] ?>">
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Address</span>
                        </td>
                        <td>
                            <label>
                                <span class="form-input">
                                    <div class="style-icon">
                                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                                    </div>
                                    <input type="text" style="padding-left: 10px" placeholder="Address" name="address" value="<?= @$_POST['address'] ?>">
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>City</span>
                        </td>
                        <td>
                            <label>
                                <span class="form-input">
                                    <div class="style-icon">
                                        <i class="fa-solid fa-building"></i>
                                    </div>
                                    <select name="city" style="width: 180px; padding-left: 10px;">
                                        <option value="" <?= @$_POST['city'] == 1 ? '' : '' ?>>--Select option--</option>
                                        <option value="Hà Nội" <?= @$_POST['city'] == 2 ? 'selected' : '' ?>>Hà Nội</option>
                                        <option value="Ninh Bình" <?= @$_POST['city'] == 3 ? 'selected' : '' ?>>Ninh Bình</option>
                                        <option value="Nam Định" <?= @$_POST['city'] == 4 ? 'selected' : '' ?>>Nam Định</option>
                                        <option value="Hải Phòng" <?= @$_POST['city'] == 5 ? 'selected' : '' ?>>Hải Phòng</option>
                                        <option value="Thái Bình" <?= @$_POST['city'] == 6 ? 'selected' : '' ?>>Thái Bình</option>
                                        <option value="Thanh Hóa" <?= @$_POST['city'] == 7 ? 'selected' : '' ?>>Thanh Hóa</option>
                                        <option value="Nghệ An" <?= @$_POST['city'] == 8 ? 'selected' : '' ?>>Nghệ An</option>
                                        <option value="TP. Hồ Chí Minh" <?= @$_POST['city'] == 9 ? 'selected' : '' ?>>TP. Hồ Chí Minh</option>
                                    </select>
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Upload Image</span>
                        </td>
                        <td>
                            <label>
                                <span class="form-input">
                                    <input type="file" name="img" value="<?= @$_POST['img'] ?>">
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Description</span>
                        </td>
                        <td>
                            <label>
                                <span class="form-input">
                                    <div class="style-icon description">
                                        <i class="fa-solid fa-pen"></i>
                                    </div>
                                    <textarea name="info" cols="21" rows="5" style="width:180px"><?= htmlspecialchars(@$_POST['info']) ?></textarea>
                                </span>
                            </label>
                        </td>
                    </tr>
                </table>
                <button class="btn">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>