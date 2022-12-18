---
extends: _layouts.post
section: content
title: Day of the year
problemUrl: https://leetcode.com/problems/day-of-the-year/
date: 2022-12-18
categories: [math-and-geometry]
---

We can use the `datetime` module to convert the date to a datetime object and then use the `timetuple` method to get the day of the year.

```python
import datetime

class Solution:
    def dayOfYear(self, date: str) -> int:
        Y, M, D = map(int, date.split('-'))
        return int((datetime.datetime(Y, M, D) - datetime.datetime(Y, 1, 1)).days + 1)
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`

We can also use python's calendar module to get the day of the year.

```python
import calendar

class Solution:
    def dayOfYear(self, date: str) -> int:
        def daysInAMonth(year: int, month: int) -> int:
            return calendar.monthrange(year, month)[1]
            
        year, month, day = map(int, date.split('-'))
        res = 0
        for mon in range(1, month):
            res += daysInAMonth(year, mon)
        
        return res + day
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`