# Web Application Security – Attack Scenarios & Mitigation Notes

## Introduction
This document contains common web application vulnerabilities, attack scenarios, impacts, and mitigation techniques identified during security testing using DVWA and security testing tools.

---

# 1. SQL Injection (SQLi)

## Description
SQL Injection occurs when user input is directly inserted into SQL queries without proper validation.

## Attack Scenario
An attacker enters:
```sql
' OR 1=1 --
```

in the login field to bypass authentication and gain unauthorized access to the application database.

## Impact
- Authentication bypass
- Database information disclosure
- Data modification or deletion
- Administrative access

## Mitigation Techniques
- Use Prepared Statements / Parameterized Queries
- Validate and sanitize user inputs
- Avoid displaying database errors
- Use least privilege database accounts

## Example
```php
$stmt = $pdo->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->execute([$username, $password]);
```

---

# 2. Cross-Site Scripting (XSS)

## Description
XSS allows attackers to inject malicious JavaScript into web pages viewed by users.

## Attack Scenario
An attacker submits:
```html
<script>alert('XSS')</script>
```

into a comment field. When another user opens the page, the malicious script executes in their browser.

## Impact
- Session hijacking
- Cookie theft
- Defacement
- Redirection to malicious websites

## Mitigation Techniques
- Validate and sanitize user input
- Encode output using `htmlspecialchars()`
- Implement Content Security Policy (CSP)
- Use HTTPOnly cookies

## Example
```php
echo htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
```

---

# 3. Cross-Site Request Forgery (CSRF)

## Description
CSRF tricks authenticated users into performing unintended actions.

## Attack Scenario
An attacker sends a malicious link that changes the victim’s password when clicked while logged into the application.

## Impact
- Unauthorized password changes
- Unauthorized transactions
- Account compromise

## Mitigation Techniques
- Use CSRF tokens
- Verify request origin
- Use SameSite cookies
- Require re-authentication for sensitive actions

## Example
```php
$_SESSION['token'] = bin2hex(random_bytes(32));
```

---

# 4. File Inclusion Vulnerabilities (LFI/RFI)

## Description
File Inclusion vulnerabilities allow attackers to include unauthorized files in a web application.

## Attack Scenario
An attacker manipulates URL parameters like:
```bash
?page=../../etc/passwd
```

to access sensitive system files.

## Impact
- Sensitive file disclosure
- Remote code execution
- Server compromise

## Mitigation Techniques
- Validate file paths
- Disable remote file inclusion
- Use allowlists for accessible files
- Restrict file permissions

## Example
```php
$allowed_pages = ['home.php', 'about.php'];

if(in_array($page, $allowed_pages)){
    include($page);
}
```

---

# 5. Burp Suite Request Manipulation / Fuzzing

## Description
Attackers can intercept and modify HTTP requests using tools like Burp Suite.

## Attack Scenario
An attacker modifies login requests repeatedly to brute-force user credentials or bypass authentication checks.

## Impact
- Unauthorized access
- Credential attacks
- Discovery of hidden vulnerabilities

## Mitigation Techniques
- Implement rate limiting
- Use CAPTCHA protection
- Apply account lockout policies
- Validate all requests server-side

---

# 6. Missing Security Headers

## Description
Missing HTTP security headers expose applications to multiple client-side attacks.

## Attack Scenario
An attacker exploits missing security headers to perform clickjacking or MIME-sniffing attacks.

## Impact
- Browser-based attacks
- Data theft
- Increased XSS risk

## Mitigation Techniques
- Add X-Frame-Options
- Add Content-Security-Policy
- Add X-Content-Type-Options
- Enable HSTS

## Example
```apache
Header always set X-Frame-Options "DENY"
Header always set X-Content-Type-Options "nosniff"
Header set Content-Security-Policy "default-src 'self';"
```

---

# Additional Security Best Practices

- Keep software updated regularly
- Use HTTPS instead of HTTP
- Perform regular vulnerability assessments
- Enable Multi-Factor Authentication (MFA)
- Monitor logs and suspicious activities
- Conduct regular penetration testing

---

# Conclusion

The security testing identified multiple web application vulnerabilities including SQL Injection, Cross-Site Scripting (XSS), Cross-Site Request Forgery (CSRF), File Inclusion vulnerabilities, insecure request manipulation, and missing security headers. Proper implementation of secure coding practices, input validation, authentication mechanisms, and security configurations can significantly reduce the risk of cyber attacks and improve overall application security.
