# TASK 2 - NETWORK SECURITY & SCANNING

## Summary

Metasploitable2 (192.168.56.101) was assessed for security via reconnaissance, scanning, and packet analysis.

## Reconnaissance
Conducted via whois, nslookup, and nmap ping scan. Information discovered through banner grabbing: vsFTPd 2.3.4 and OpenSSH 4.7.

## Scanning
Open ports identified: 21, 22, 23, 80, 139, 445, 3306. Service and OS scans identified old Linux-based services.

## Vulnerability Assessment
Using Nmap NSE, a number of vulnerabilities were identified: vsFTPd backdoor and outdated software versions.

## Packet Analysis
Wireshark captured plain text HTTP information and FTP credentials transfer. SYN flood attack simulated using hping3.

## Firewall
iptables rules blocked Telnet and ICMP connections.

## Conclusion
The system is highly vulnerable because of open ports, outdated services, and insecure communications. Suggestions: turn off Telnet, enable SFTP, update services, and set up firewall.
