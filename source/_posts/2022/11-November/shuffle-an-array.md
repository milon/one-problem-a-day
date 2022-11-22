---
extends: _layouts.post
section: content
title: Shuffle an array
problemUrl: https://leetcode.com/problems/shuffle-an-array/
date: 2022-11-22
categories: [math-and-geometry, design]
---

We will use a list to store the original array. Then, we will use a list to store the shuffled array. Then, we will use a random number generator to generate a random number. Then, we will swap the number at the random index with the number at the last index. Then, we will pop the number at the last index and append it to the shuffled array. Then, we will repeat the process until the shuffled array is the same length as the original array. Then, we will return the shuffled array.

```python
class Solution:

    def __init__(self, nums: List[int]):
        self.original = nums
        self.shuffled = nums[:]

    def reset(self) -> List[int]:
        self.shuffled = self.original[:]
        return self.original

    def shuffle(self) -> List[int]:
        for i in range(len(self.shuffled)):
            rand = random.randint(i, len(self.shuffled) - 1)
            self.shuffled[i], self.shuffled[rand] = self.shuffled[rand], self.shuffled[i]
        return self.shuffled
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`