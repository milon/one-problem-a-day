---
extends: _layouts.post
section: content
title: Reorder data in log files
problemUrl: https://leetcode.com/problems/reorder-data-in-log-files/
date: 2022-09-13
categories: [array-and-hashmap]
---

We will create two different array, one for the letter logs and another for the digits logs. Then we iterate over all the logs and separate them. Then we sort the letters log, first by the content, and if the content are the same then by the key. Finally we merge both letter logs and digit logs and return it as the result.

```python
class Solution:
    def reorderLogFiles(self, logs: List[str]) -> List[str]:
        letters, digits = [], []
        
        for log in logs:
            if log[-1].isdigit():
                digits.append(log)
            else:
                letters.append(log)
        
        letters.sort(key=(lambda x: (x.split()[1:], x.split()[0])))
        
        return letters + digits
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`