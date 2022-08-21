---
extends: _layouts.post
section: content
title: Number of good ways to split a string
problemUrl: https://leetcode.com/problems/number-of-good-ways-to-split-a-string/
date: 2022-08-21
categories: [array-and-hashmap]
---

We will first count the characters in the string. Then we iterate over the string, add this to the set, and remove the occurance from the count. Then if the length of the set is equal to the length of the count, we increase the result by 1. Finally return result after interation is over.

```python
class Solution:
    def numSplits(self, s: str) -> int:
        count = collections.Counter(s)
        left, res = set(), 0
        for char in s:
            if char in count:
                count[char] -= 1
                if count[char] == 0:
                    count.pop(char)
            left.add(char)
            if len(left) == len(count):
                res += 1
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
