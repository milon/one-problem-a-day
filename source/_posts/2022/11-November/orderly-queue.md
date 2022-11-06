---
extends: _layouts.post
section: content
title: Orderly queue
problemUrl: https://leetcode.com/problems/orderly-queue/
date: 2022-11-06
categories: [array-and-hashmap]
---

For k>1 (we just check for k=2), any two adjacent characters can be swapped: abXYZ -> abXYZ -> aXYZb -> XYZba -> YZbaX -> ZbaXY -> baXYZ. If ab are not in the beginning of the string, i.e., DEabF, we first rotate the string DEabF -> EabFD -> abFDE, then apply the swap algorithm. If we can swap adjacent characters then we can swap any characters in the string, thus, completely sorting the string. For k=1, the best we can do is rotate the sting character by character and search for the lexicographically minimal one.

```python
class Solution:
    def orderlyQueue(self, s: str, k: int) -> str:
        if k > 1:
            return ''.join(sorted(s))
        else:
            res = s
            for i in range(len(s)):
                res = min(res, s[i:] + s[:i])
            return res
```

Time Complexity: `O(n^n)` <br/>
Space Complexity: `O(n)`