---
extends: _layouts.post
section: content
title: Compare version numbers
problemUrl: https://leetcode.com/problems/compare-version-numbers/
date: 2022-08-25
categories: [two-pointers]
---

First we split 2 versions with `.` and loop over the minimum number of both lenght, check whether one or two is bigger then return immediately. If both are equal, then we check whether we have any number left at any version, if yes, we return accordingly. If it is also not possible, then we are certain that 2 versions are qeual, then return 0.

```python
class Solution:
    def compareVersion(self, version1: str, version2: str) -> int:
        l1 = version1.split('.')
        l2 = version2.split('.')
        
        minVersion = min(len(l1), len(l2))
        
        for i in range(minVersion):
            if int(l1[i]) > int(l2[i]):
                return 1
            elif int(l1[i]) < int(l2[i]):
                return -1
        
        if len(l1) > len(l2):
            for i in range(len(l2), len(l1)):
                if int(l1[i]):
                    return 1
        
        if len(l1) < len(l2):
            for i in range(len(l1), len(l2)):
                if int(l2[i]):
                    return -1
        
        return 0
```

Time Complexity: `O(n)`, n is the number of `.` present in largest version
Space Complexity: `O(n)`