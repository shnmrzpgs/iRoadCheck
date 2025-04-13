FOR /L %%N IN () DO (
 ssh -p 443 -R0:127.0.0.1:8000 -o StrictHostKeyChecking=no -o ServerAliveInterval=30 -t WcqNe7l0ziV^+force@ap.pro.pinggy.io x:https x:passpreflight
timeout /t 10)
