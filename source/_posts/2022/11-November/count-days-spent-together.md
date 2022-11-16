---
extends: _layouts.post
section: content
title: Count days spent together
problemUrl: https://leetcode.com/problems/count-days-spent-together/
date: 2022-11-16
categories: [array-and-hashmap]
---

We will use a helper function to get the number of days from the beginning of the year to the given date. Then take the maximum of arrival date and minimum of departure date and subtract the minimum of arrival date and maximum of departure date.

```python
class Solution:
    def countDaysTogether(self, arriveAlice: str, leaveAlice: str, arriveBob: str, leaveBob: str) -> int:
        arriveDate = max(arriveAlice, arriveBob)
        leaveDate = min(leaveAlice, leaveBob)
        
        return max(0, self.getDays(leaveDate) - self.getDays(arriveDate) + 1)
        
    def getDays(self, date):
        monthList = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
        months = int(date[:2])
        days = int(date[3:])
        return sum(monthList[:months-1]) + days
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`