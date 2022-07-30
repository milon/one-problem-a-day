---
extends: _layouts.post
section: content
title: Daily temperatures
problemUrl: https://leetcode.com/problems/daily-temperatures/
date: 2022-07-30
categories: [stack]
---

We will initialize the result array and assign zero to each elements. We will iterate through the temperatures, and if the stack is empty or stack top value is less that the current temperature, then we will push the temperature and the index in our stack. Otherwise, we pop from the stack, and replace the result array index value with the difference between 2 index. Once the iteration is done, we return the result. As we start with a zero filled result array, we don't have to fill any missing day temperature.

```python
class Solution:
    def dailyTemperatures(self, temperatures: List[int]) -> List[int]:
        res = [0] * len(temperatures)
        stack = []  # pair(temp, index)

        for i, t in enumerate(temperatures):
            while stack and stack[-1][0] < t:
                stackTemp, stackIndex = stack.pop()
                res[stackIndex] = (i-stackIndex)
            stack.append([t, i])

        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`