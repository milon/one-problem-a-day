---
extends: _layouts.post
section: content
title: Partition labels
problemUrl: https://leetcode.com/problems/partition-labels/
date: 2022-08-10
categories: [greedy]
---

We will first count the last position of all chacracter in a hashmap. Then we will iterate through the string, check if the last index of the chacracter is equal to the current index, if yes, then we append the current length to our result. We will repeat this till the end of the string and then return the result.

```python
class Solution:
    def partitionLabels(self, s: str) -> List[int]:
        res = []
        count = {}
        i, length = 0, len(s)
        for j in range(length):
            count[s[j]] = j
        
        curLen = 0
        goal = 0
        while i < length:
            c = s[i]
            goal = max(goal, count[c])
            curLen += 1
            
            if goal == i:
                res.append(curLen)
                curLen = 0
            i += 1
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`