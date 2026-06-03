# DVWA Testing Checklist

## Security Vulnerabilities to Test

### Day 50-52: Basic Vulnerabilities

**SQL Injection (Database Hacking)**
- [ ] Test basic injection (single quote)
- [ ] Extract database version
- [ ] Extract table names
- [ ] Extract column names
- [ ] Extract user credentials
- [ ] Document all payloads
- [ ] Take screenshots

**Reflected XSS (Code Injection)**
- [ ] Test alert payload
- [ ] Test cookie stealing
- [ ] Test form hijacking
- [ ] Document findings
- [ ] Take screenshots

**Stored XSS (Permanent Code Injection)**
- [ ] Inject code in guestbook
- [ ] Verify persistence
- [ ] Document impact
- [ ] Take screenshots

**CSRF (Fake Requests)**
- [ ] Test password change
- [ ] Create attack page
- [ ] Document findings
- [ ] Take screenshots

**Broken Access Control**
- [ ] Test unauthorized access
- [ ] Test privilege escalation
- [ ] Document findings
- [ ] Take screenshots

### Day 53: Advanced Testing

**Burp Suite Techniques**
- [ ] Intercept login request
- [ ] Modify parameters
- [ ] Test for authorization
- [ ] Perform fuzzing
- [ ] Document findings

### Day 54: Analysis

**Post-Exploitation**
- [ ] Analyze all findings
- [ ] Determine severity
- [ ] Understand business impact
- [ ] Plan recommendations

## Screenshots Needed
- [ ] DVWA login page
- [ ] Each successful exploit
- [ ] Error messages
- [ ] Extracted data
- [ ] Burp Suite intercepts

## Documentation
- [ ] Exploit payloads
- [ ] Discovery process
- [ ] Impact analysis
- [ ] Remediation steps
