---
extends: _layouts.post
section: content
title: Queue reconstruction by height
problemUrl: https://leetcode.com/problems/queue-reconstruction-by-height/
date: 2023-01-23
categories: [greedy]
---

We can sort people by their height in descending order and if heights are equal, by the number of people in front of them in ascending order. Then we can insert each person into the result array at the index equal to the number of people in front of them. This way we will always insert a person into the result array at the index where there are no people taller than him.

```python
class Solution:
    def reconstructQueue(self, people: List[List[int]]) -> List[List[int]]:
        people.sort(key=lambda x: (-x[0], x[1]))
        res = []
        for p in people:
            res.insert(p[1], p)
        return res
```

Time complexity: `O(nlog(n))`, n is the length of the array. <br/>
Space complexity: `O(n)`
