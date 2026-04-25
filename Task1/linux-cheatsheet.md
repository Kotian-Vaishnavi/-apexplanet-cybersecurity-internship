# Linux Command Cheatsheet

# Navigation

I use `pwd` to find out what my current directory is.

`ls` helps me list all the files in my directory.

For a detailed list, including hidden files I use `ls -la`.

To change my directory I use `cd /path`. To go to my home folder I use `cd ~`.

If I need to go up one level I simply use `cd..`.

# File Operations

To create a file I use `touch file.txt`.

If I want to create a folder I use `mkdir folder`.

To delete a file I use `rm file.txt`.

I can copy a file using `cp file and move or rename a file using `mv file dest`.

To view the contents of a file I use `cat file.txt` and to edit a file I use `nano file.txt`.

# Permissions

I change permissions using `chmod 755 file` to give the owner read, write and execute permissions and others read and execute permissions.

To make a file executable I use `chmod x file`.

If I need to change the owner of a file I use ` user file`.

I can view permissions using ` -la`.

# Networking

To view my network interfaces I use `ifconfig`.

The modern version of `ifconfig` is `ip a`.

I test connectivity to an IP using `ping IP`.

To view ports I use `netstat -tulnp`.

If I need to trace the network path to a host I use `traceroute host`.

# Package Management

To refresh my package list I use `sudo update`.

I install a package using `sudo install pkg`.

To remove a package I use `sudo apt remove pkg`.

I can list all installed packages using `dpkg -l`.

# System Info

To find out who I am currently logged in as I use `whoami`.

I get system information using `uname -a`.

To check my disk space I use `df -h`.

I view running processes using `ps aux`.

Finally to clear my terminal I use `clear`.
