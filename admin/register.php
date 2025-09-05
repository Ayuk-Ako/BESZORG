<?php
session_start(); // Start session for error messages and user state
include 'db_connect.php'; // Include database connection

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Determine form type (login or signup)
    $form_type = $_POST['form_type'] ?? '';

    if ($form_type === 'signup') {
        // Signup logic
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Validate inputs
        if (empty($name)) {
            $errors[] = "Name is required.";
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Valid email is required.";
        }
        if (empty($password) || strlen($password) < 6) {
            $errors[] = "Password must be at least 6 characters.";
        }

        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $errors[] = "Email is already registered.";
        }
        $stmt->close();

        // If no errors, proceed with signup
        if (empty($errors)) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT); // Hash password
            $role = 'admin'; // Set role to admin

            $stmt = $conn->prepare("INSERT INTO users (name, email, password_hash, role) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $password_hash, $role);

            if ($stmt->execute()) {
                $success = "Account created successfully! Please log in.";
            } else {
                $errors[] = "Error creating account. Please try again.";
            }
            $stmt->close();
        }
    } elseif ($form_type === 'login') {
        // Login logic
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Validate inputs
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Valid email is required.";
        }
        if (empty($password)) {
            $errors[] = "Password is required.";
        }

        // Check credentials
        if (empty($errors)) {
            $stmt = $conn->prepare("SELECT id, name, password_hash, role FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user && password_verify($password, $user['password_hash']) && $user['role'] === 'admin') {
                // Start session and store user data
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'];
                header("Location: dashboard.php"); // Redirect to admin dashboard
                exit();
            } else {
                $errors[] = "Invalid email, password, or not an admin account.";
            }
            $stmt->close();
        }
    } else {
        $errors[] = "Invalid form submission.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BESZORG Admin Auth</title>
  <style>
    :root {
      --sidebar-w: 280px;
      --brand: #1a936f;
      --brand-2: #116466;
      --bg: #f7faf9;
      --text: #1f2937;
    }
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, var(--brand-2), var(--brand));
    }
    .auth-container {
      width: 400px;
      padding: 30px;
      border-radius: 15px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
      color: var(--text);
      position: relative;
      overflow: hidden;
    }
    .auth-header {
      text-align: center;
      margin-bottom: 20px;
    }
    .auth-header h2 {
      font-size: 26px;
      font-weight: bold;
      color: var(--brand-2);
    }
    .auth-header p {
      color: var(--text);
      font-size: 14px;
      opacity: 0.8;
    }
    form {
      display: none;
      flex-direction: column;
      gap: 15px;
    }
    form.active {
      display: flex;
    }
    input {
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      outline: none;
      font-size: 14px;
    }
    button {
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: var(--brand);
      color: #fff;
      font-size: 15px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
    }
    button:hover {
      background: var(--brand-2);
    }
    .toggle-text {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
      color: var(--text);
    }
    .toggle-text span {
      color: var(--brand-2);
      cursor: pointer;
      font-weight: bold;
    }
    .error, .success {
      color: #fff;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 15px;
      text-align: center;
    }
    .error {
      background: #e63946;
    }
    .success {
      background: var(--brand);
    }
  </style>
</head>
<body>

  <div class="auth-container">
    <!-- Display errors or success messages -->
    <?php if (!empty($errors)): ?>
      <div class="error">
        <?php foreach ($errors as $error): ?>
          <p><?php echo htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
      <div class="success">
        <p><?php echo htmlspecialchars($success); ?></p>
      </div>
    <?php endif; ?>

    <!-- Header with company name -->
    <div class="auth-header">
      <h2>BESZORG Admin</h2>
      <p id="formTitle">Login to continue</p>
    </div>

    <!-- Login Form -->
    <form id="loginForm" class="active" method="POST" action="">
      <input type="hidden" name="form_type" value="login">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>

    <!-- Sign Up Form -->
    <form id="signupForm" method="POST" action="">
      <input type="hidden" name="form_type" value="signup">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Sign Up</button>
    </form>

    <!-- Toggle link -->
    <div class="toggle-text">
      <p id="toggleMessage">Don't have an account? <span id="toggleLink">Sign Up</span></p>
    </div>
  </div>

  <script>
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const formTitle = document.getElementById('formTitle');
    const toggleMessage = document.getElementById('toggleMessage');

    function toggleForms(toSignup) {
      if (toSignup) {
        loginForm.classList.remove('active');
        signupForm.classList.add('active');
        formTitle.textContent = "Create an account";
        toggleMessage.innerHTML = `Already have an account? <span id="toggleLink">Login</span>`;
      } else {
        signupForm.classList.remove('active');
        loginForm.classList.add('active');
        formTitle.textContent = "Login to continue";
        toggleMessage.innerHTML = `Don't have an account? <span id="toggleLink">Sign Up</span>`;
      }
      document.getElementById('toggleLink').addEventListener('click', () => {
        toggleForms(toSignup ? false : true);
      });
    }

    document.getElementById('toggleLink').addEventListener('click', () => {
      toggleForms(true);
    });
  </script>

</body>
</html>