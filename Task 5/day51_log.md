# Day 51: CSRF, Access Control & Security Headers - COMPLETED 

## Time Spent: 3 hours

## Vulnerabilities Exploited

### 1. CSRF (Cross-Site Request Forgery) - HIGH
- Location: Password change form
- Severity: HIGH (CVSS 8.1)
- Method: Created HTML attack page with hidden form
- Result:  Password changed from `password` to `hacked123` without user action
- Impact: Account takeover, unauthorized changes
- Fix: Use POST method, implement CSRF tokens, validate Referer header

### 2. Broken Access Control - CRITICAL
- Location: System file permissions / DVWA config
- Severity:  CRITICAL (CVSS 8.0+)
- Files Accessed:
   /etc/passwd - System user enumeration
   /etc/apache2/apache2.conf - Server configuration
   /var/www/html/dvwa/config/config.inc.php - Database credentials
- Result:  Successfully extracted all credentials
- Impact: Database access, credential exposure, bypass web application
- Fix: Restrict file permissions (chmod 600), move config outside web root, use environment variables

### 3. Security Misconfiguration (Missing Headers) - MEDIUM
- Location: HTTP Response Headers
- Severity:  MEDIUM (CVSS 6.5+)
- Headers Present (Good):
   Content-Security-Policy: default-src 'self'
   X-Frame-Options: DENY
   X-Content-Type-Options: nosniff
   X-XSS-Protection: 1;mode=block
- Headers Missing (Bad):
   Strict-Transport-Security
   Referrer-Policy
   Permissions-Policy
- Grade: B+ (Good but incomplete)
- Fix: Add HSTS header, add Referrer-Policy, add Permissions-Policy

## Screenshots Taken
- csrf_attack_page.png
- csrf_password_changed.png
- broken_access_control_passwd.png
- broken_access_control_config.png
- security_headers_firefox_tools.png

**Total: 5 screenshots**

## Exploitation Summary
| Vulnerability   | Time  |Success|
|----------------------------------
| CSRF            | 10 min| Yes   |
| Access Control  | 5 min | Yes   |
| Security Headers| 5 min | Yes   |

## Running Total
- Days 50-51: 15+ vulnerabilities found
- Categories: SQL Injection, Reflected XSS, Stored XSS, CSRF, Access Control, Security Misconfiguration
- On Track: YES 

## Tomorrow's Plan (Day 52)
- Test remaining OWASP Top 10 vulnerabilities
- Advanced Burp Suite techniques
- Target: 25+ total vulnerabilities by Day 58
