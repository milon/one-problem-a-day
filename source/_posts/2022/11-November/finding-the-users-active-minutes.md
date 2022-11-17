---
extends: _layouts.post
section: content
title: Finding the users active minutes
problemUrl: https://leetcode.com/problems/finding-the-users-active-minutes/
date: 2022-11-17
categories: [array-and-hashmap]
---

We will use a hashset to count the unique logs for each user. Then we iterate over that, take the length of the hashset and add it to the result.

```python
class Solution:
    def findingUsersActiveMinutes(self, logs: List[List[int]], k: int) -> List[int]:
        uams = collections.defaultdict(set)
        for _id, time in logs:
            uams[_id].add(time)
        
        res = [0] * k
        for uam in uams.values():
            res[len(uam)-1] += 1
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`

