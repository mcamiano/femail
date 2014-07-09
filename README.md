<img class="emoji" title=":email:" alt=":email:" src="https://assets-cdn.github.com/images/icons/emoji/unicode/2709-fe0f.png" height="60" width="80" align="absmiddle">

A fake sendmail and simple web page client to browse the mail messages not really sent.

To use, edit php.ini and set the sendmail parameter to fakesendmail.

Manage the fake mail by accessing `readfakemail.php`.
Click the "Fake Mailbox" heading to re-poll the mailbox.

## Notes

To disable sqlite, edit fakesendmail and comment out the `nohup fakesendmail.sqlite.repo` line.

This tool uses a FIFO in `/tmp/_maildump` to serialize messages. If you disable sqlite, you can 
access the FIFO as a read-once device via `tail -f /tmp/_maildump`.

Uses sqlite to store messages in /tmp/_fakemailbox otherwise.
Uses pdo sqlite to read messages; simple ajax endpoint PHP page provided.
Uses jquery ajax to poll messages; simple mail reading and deleting PHP page provided.

You can send fake mail at the command line by piping output directly to fakesendmail:
```
date | fakesendmail
```

When you are done, you may want to 
```
ps |grep fakesendmail
```
and kill the fakesendmail processes you see running.


## WARNING

** Secure? Hah! NOT!!! **

**If you use this anywhere near a production site, you are really truly stupid.**

## Copyright

THIS SOFTWARE IS IN THE PUBLIC DOMAIN. NO WARRANTIES ARE EXPRESSED OR IMPLIED.

Use this software at your own risk. 

You alone are responsible if you destroy data, property, or your reputation by using this software.

