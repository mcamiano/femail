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

