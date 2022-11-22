---
extends: _layouts.post
section: content
title: Random pick index
problemUrl: https://leetcode.com/problems/random-pick-index/
date: 2022-11-22
categories: [array-and-hashmap, design]
---

We will use a dictionary to store the indices of the numbers. Then, we will iterate through the given array and store the indices of the numbers in the dictionary. Then, we will use a random number generator to generate a random number. Then, we will return the number at the random index in the dictionary.

```python
class Solution:
    def __init__(self, nums: List[int]):
        self.store = collections.defaultdict(list)
        for i, num in enumerate(nums):
            self.store[num].append(i)

    def pick(self, target: int) -> int:
        return random.choice(self.store[target])

# Your Solution object will be instantiated and called as such:
# obj = Solution(nums)
# param_1 = obj.pick(target)
```

Time complexity: `O(1)` <br/>
Space complexity: `O(n)`