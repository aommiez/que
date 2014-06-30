@echo off
title que-sync

:loop1

timeout /t 5 /nobreak

php sync_que.php

goto loop1

pause
exit