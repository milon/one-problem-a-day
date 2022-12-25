---
extends: _layouts.post
section: content
title: Reward top k students
problemUrl: https://leetcode.com/problems/reward-top-k-students/
date: 2022-12-25
categories: [array-and-hashmap]
---

We will sort the students by their scores and then iterate over the students and reward them.

```python
class Solution:
    def topStudents(self, positive_feedback: List[str], negative_feedback: List[str], report: List[str], student_id: List[int], k: int) -> List[int]:
        res = []
        positive, negative = set(positive_feedback), set(negative_feedback)
        for st_id, rep in zip(student_id, report):
            points = 0
            for word in rep.split():
                if word in positive:
                    points += 3
                elif word in negative:
                    points -= 1

            res.append((st_id, points))
        
        return [i[0] for i in sorted(res, key=lambda x: (-x[1], x[0]))[:k]]
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`