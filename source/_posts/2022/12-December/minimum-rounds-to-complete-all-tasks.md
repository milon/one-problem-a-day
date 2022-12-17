---
extends: _layouts.post
section: content
title: Minimum rounds to complete all tasks
problemUrl: https://leetcode.com/problems/minimum-rounds-to-complete-all-tasks/
date: 2022-12-17
categories: [greedy]
---

We will count the different tasks and calculate the number of rounds for each task. Then we will return the maximum number of rounds.

```python
class Solution:
    def minimumRounds(self, tasks: List[int]) -> int:
        counter = collections.Counter(tasks)
        res = 0
        for count in counter.values():
            if count <= 1:
                return -1
            res += math.ceil(count/3)
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`